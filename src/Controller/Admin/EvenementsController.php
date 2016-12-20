<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Evenements Controller
 *
 * @property \App\Model\Table\EvenementsTable $Evenements
 */
class EvenementsController extends AppController
{
	public $idxUser=0;
	public $idxEvt=0;
	public $idxDate=0;
	public $idxLieu=0;
	public $idxCategorie=0;
	public $idxDistance=0;
	public $idxDenivele=0;
	public $idxTempsPuce=0;
	public $idxTempsOfficiel=0;
	public $idxInscription=0;
	
	/**
	 * Init from file method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function initfromfile()
	{
		if (($handle = fopen("/tmp/performancessection.csv", "r")) !== FALSE) {
			$row=1;
			$titre=fgetcsv($handle, 1000, ",");
			$i=0;
			foreach($titre as $t){
				echo $t.',';
				if($t=='Qui?'){$this->idxUser=$i;}
				if($t=='Quoi?'){$this->idxEvt=$i;}
				if($t=='Date'){$this->idxDate=$i;}
				if($t=='Ou'){$this->idxLieu=$i;}
				if($t=='Course'){$this->idxCategorie=$i;}
				if($t=='Distance'){$this->idxDistance=$i;}
				if($t=='Denivele'){$this->idxDenivele=$i;}
				if($t=='Temps puce'){$this->idxTempsPuce=$i;}
				if($t=='Temps scratch'){$this->idxTempsOfficiel=$i;}
				if($t=='Prix'){$this->idxInscription=$i;}
				$i++;
			}
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				//echo "<p> $num fields in line $row: <br /></p>\n";
				$row++;
				//echo "<p>evt=$data[$idxEvt]</p>";
				/*
				for ($c=0; $c < $num; $c++) {
					echo $data[$c] . "<br />\n";
				}4
				*/
				/*
				 * Gestion de l'utilisateur
				 */
				$user_id=$this->setUser($data);
				
				/*
				 * Gestion de l'événement
				 */
				$evt_id=$this->setEvenement($data);
				
				/*
				 * Gestion du resultat
				 */
				$res_id=$this->setResultat($data,$user_id,$evt_id);
			}
			fclose($handle);
		}
	}
	
	protected function setResultat($data,$user_id,$evt_id) {
		$this->loadModel ( 'Resultats' );
		$resultats = $this->Resultats->find ( 'all', [
				'conditions' => ['user_id' => $user_id,'evenement_id'=>$evt_id]
		] );
		if ($resultats->count () > 0) {
			// La personne est déjà dans la base
			$resultat = $resultats->first ();
			debug ( 'Déjà dans la base: id='. $resultat->id );
			$id=$resultat->id;
		} else {
			debug("Temps scratch=".$data[$this->idxTempsOfficiel]);
			$resultat = $this->Resultats->newEntity ();
			$resultat->user_id = $user_id;
			$resultat->evenement_id = $evt_id;
			$resultat->temps_puce = $data[$this->idxTempsPuce];
			$resultat->temps_officiel = $data[$this->idxTempsOfficiel];
			$resultat->inscription = $data[$this->idxInscription];
			
			debug('ajout resultat user_id = '.$user_id.' evt_id='.$evt_id.' inscription=['.$resultat->inscription.']');	
			$result=$this->Resultats->save ( $resultat );
			$id=$result->id;
		}
		return($id);
	}
	
	protected function setUser($data) {
		$this->loadModel ( 'Users' );
		$users = $this->Users->find ( 'all', [
				'conditions' => ['nom' => $data[$this->idxUser]]
		] );
		if ($users->count () > 0) {
			// La personne est déjà dans la base
			$user = $users->first ();
			debug ( 'Déjà dans la base:[' . $user->nom . '] id='. $user->id );
			$id=$user->id;
		} else {
			$user = $this->Users->newEntity ();
			$user->nom = ucwords ( strtolower ( $data [$this->idxUser] ) );
			$n = explode ( " ", strtolower ( $this->str_to_noaccent ( $data [$this->idxUser] ) ) );
			$user->email = sprintf ( '%s.%s@orange.com', $n [0], $n [1] );
			// debug($evenement);
			$result=$this->Users->save ( $user );
			debug ( 'Ajout de:' . $data [$this->idxUser] . ' email:' . $user->email.' id='.$result->id );
			$id=$result->id;
		}
		return($id);
	}
	
	protected function setEvenement($data) {
		$evenements = $this->Evenements->find ( 'all', [ 
				'conditions' => [ 
						'evenement' => $data [$this->idxEvt],
						'date' => $data [$this->idxDate] 
				] 
		] );
		if ($evenements->count () > 0) {
			// L'événement est déjà dans la base
			$evt = $evenements->first ();
			debug ( 'Déjà dans la base:[' . $evt->evenement . '] date=' . $evt->date . ' id=' . $evt->id );
			$id = $evt->id;
		} else {
			// Creation de l'événement
			// debug($evenements);
			if ((strlen ( $data [$this->idxEvt] ) > 0) && (strlen ( $data [$ithis->dxDate] ) > 0)) {
				$evenement = $this->Evenements->newEntity ();
				$evenement->evenement = $data [$this->idxEvt];
				$evenement->date = $data [$this->idxDate];
				$evenement->lieu = $data [$this->idxLieu];
				$evenement->distance = $data [$this->idxDistance];
				$evenement->denivele = $data [$this->idxDenivele];
				switch (strtolower ( $data [$this->idxCategorie] )) {
					case 'trail' :
						$evenement->category_id = 2;
						break;
					case 'route' :
						$evenement->category_id = 1;
						break;
					case 'triathlon' :
						$evenement->category_id = 3;
						break;
				}
				// debug($evenement);
				$result = $this->Evenements->save ( $evenement );
				debug ( 'Ajout de:' . $data [$this->idxEvt] );
				$id = $result->id;
			}
		}
		return ($id);
	}
	
	protected function str_to_noaccent($str)
{
    $url = $str;
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
     
    return ($url);
}
	
    
}
