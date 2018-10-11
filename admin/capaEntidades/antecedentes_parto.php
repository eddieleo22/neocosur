<?php

/******************************************************************************
* Class for neocosur.antecedentes_parto
*******************************************************************************/

class antecedentes_parto
{
	private $ID_NEOCOSUR;
	private $OXIGENO_FLUJO_LIBRE;
	private $VENTILACION_MASC;
	private $INTUBACION;
	private $MASAJE_CARDIACO;
	private $ADRENALINA;
	private $HEMORRAGIA_PULMONAR;
	private $MLF_MAYOR;
	private $MLF_COMPROMETE_VIDA;
	private $MLF_NERVIOSO_CENTRAL;
	private $MLF_NER_ANE;
	private $MLF_NER_MIELO;
	private $MLF_NER_HIDRA;
	private $MLF_NER_HIDRO;
	private $MLF_NER_HOLO;
	private $MLF_DEF_CARDIACOS;
	private $MLF_CAR_TRON;
	private $MLF_CAR_VAS;
	private $MLF_CAR_FALL;
	private $MLF_CAR_UNI;
	private $MLF_CAR_DOB;
	private $MLF_CAR_CAN;
	private $MLF_CAR_ATRE;
	private $MLF_CAR_TRI;
	private $MLF_CAR_HIPO;
	private $MLF_CAR_AORT;
	private $MLF_CAR_ANO;
	private $MLF_DEF_GASTRO;
	private $MLF_GST_PAL;
	private $MLF_GST_FIS;
	private $MLF_GST_DUO;
	private $MLF_GST_YEY;
	private $MLF_GST_LLE;
	private $MLF_GST_REC;
	private $MLF_GST_ANO;
	private $MLF_GST_ONF;
	private $MLF_GST_GAS;
	private $MLF_DEF_URINARIOS;
	private $MLF_URI_AGE;
	private $MLF_URI_DIS;
	private $MLF_URI_URO;
	private $MLF_URI_ECT;
	private $MLF_DEF_CROMOSOMICA;
	private $MLF_CRO_13;
	private $MLF_CRO_18;
	private $MLF_CRO_21;
	private $MLF_OTROS_DEF;
	private $MLF_OTR_ESQ;
	private $MLF_OTR_HER;
	private $MLF_OTR_HID;
	private $MLF_OTR_SEC;
	private $MLF_OTR_ERR;
	private $MLF_OTR_MIO;
	private $MALF_OTROS_CUAL;
	private $SCORE_NEOCOSUR;
	private $FALLECE_SALA_PARTO;
	private $OBSERVACIONES;
	public function __get($property) 
		{
			if (property_exists($this, $property)) 
			{
				return $this->$property;
			}
		}

	public function __set($property, $value) 
	{
		if (property_exists($this, $property)) 
		{
			$this->$property = $value;
					}
	}

	function __construct (
	$ID_NEOCOSUR,
	$OXIGENO_FLUJO_LIBRE,
	$VENTILACION_MASC,
	$INTUBACION,
	$MASAJE_CARDIACO,
	$ADRENALINA,
	$MLF_MAYOR,
	$MLF_COMPROMETE_VIDA,
	$MLF_NERVIOSO_CENTRAL,
	$MLF_NER_ANE,
	$MLF_NER_MIELO,
	$MLF_NER_HIDRA,
	$MLF_NER_HIDRO,
	$MLF_NER_HOLO,
	$MLF_DEF_CARDIACOS,
	$MLF_CAR_TRON,
	$MLF_CAR_VAS,
	$MLF_CAR_FALL,
	$MLF_CAR_UNI,
	$MLF_CAR_DOB,
	$MLF_CAR_CAN,
	$MLF_CAR_ATRE,
	$MLF_CAR_TRI,
	$MLF_CAR_HIPO,
	$MLF_CAR_AORT,
	$MLF_CAR_ANO,
	$MLF_DEF_GASTRO,
	$MLF_GST_PAL,
	$MLF_GST_FIS,
	$MLF_GST_DUO,
	$MLF_GST_YEY,
	$MLF_GST_LLE,
	$MLF_GST_REC,
	$MLF_GST_ANO,
	$MLF_GST_ONF,
	$MLF_GST_GAS,
	$MLF_DEF_URINARIOS,
	$MLF_URI_AGE,
	$MLF_URI_DIS,
	$MLF_URI_URO,
	$MLF_URI_ECT,
	$MLF_DEF_CROMOSOMICA,
	$MLF_CRO_13,
	$MLF_CRO_18,
	$MLF_CRO_21,
	$MLF_OTROS_DEF,
	$MLF_OTR_ESQ,
	$MLF_OTR_HER,
	$MLF_OTR_HID,
	$MLF_OTR_SEC,
	$MLF_OTR_ERR,
	$MLF_OTR_MIO,
	$MALF_OTROS_CUAL,
	$SCORE_NEOCOSUR,
	$FALLECE_SALA_PARTO,
	$OBSERVACIONES
	){
	$this->ID_NEOCOSUR =$ID_NEOCOSUR;
	$this->OXIGENO_FLUJO_LIBRE =$OXIGENO_FLUJO_LIBRE;
	$this->VENTILACION_MASC =$VENTILACION_MASC;
	$this->INTUBACION =$INTUBACION;
	$this->MASAJE_CARDIACO =$MASAJE_CARDIACO;
	$this->ADRENALINA =$ADRENALINA;
	$this->MLF_MAYOR =$MLF_MAYOR;
	$this->MLF_COMPROMETE_VIDA =$MLF_COMPROMETE_VIDA;
	$this->MLF_NERVIOSO_CENTRAL =$MLF_NERVIOSO_CENTRAL;
	$this->MLF_NER_ANE =$MLF_NER_ANE;
	$this->MLF_NER_MIELO =$MLF_NER_MIELO;
	$this->MLF_NER_HIDRA =$MLF_NER_HIDRA;
	$this->MLF_NER_HIDRO =$MLF_NER_HIDRO;
	$this->MLF_NER_HOLO =$MLF_NER_HOLO;
	$this->MLF_DEF_CARDIACOS =$MLF_DEF_CARDIACOS;
	$this->MLF_CAR_TRON =$MLF_CAR_TRON;
	$this->MLF_CAR_VAS =$MLF_CAR_VAS;
	$this->MLF_CAR_FALL =$MLF_CAR_FALL;
	$this->MLF_CAR_UNI=$MLF_CAR_UNI;
	$this->MLF_CAR_DOB =$MLF_CAR_DOB;
	$this->MLF_CAR_CAN =$MLF_CAR_CAN;
	$this->MLF_CAR_ATRE =$MLF_CAR_ATRE;
	$this->MLF_CAR_TRI =$MLF_CAR_TRI;
	$this->MLF_CAR_HIPO =$MLF_CAR_HIPO;
	$this->MLF_CAR_AORT =$MLF_CAR_AORT;
	$this->MLF_CAR_ANO =$MLF_CAR_ANO;
	$this->MLF_DEF_GASTRO =$MLF_DEF_GASTRO;
	$this->MLF_GST_PAL =$MLF_GST_PAL;
	$this->MLF_GST_FIS =$MLF_GST_FIS;
	$this->MLF_GST_DUO =$MLF_GST_DUO;
	$this->MLF_GST_YEY =$MLF_GST_YEY;
	$this->MLF_GST_LLE =$MLF_GST_LLE;
	$this->MLF_GST_REC =$MLF_GST_REC;
	$this->MLF_GST_ANO =$MLF_GST_ANO;
	$this->MLF_GST_ONF =$MLF_GST_ONF;
	$this->MLF_GST_GAS =$MLF_GST_GAS;
	$this->MLF_DEF_URINARIOS =$MLF_DEF_URINARIOS;
	$this->MLF_URI_AGE =$MLF_URI_AGE;
	$this->MLF_URI_DIS =$MLF_URI_DIS;
	$this->MLF_URI_URO =$MLF_URI_URO;
	$this->MLF_URI_ECT =$MLF_URI_ECT;
	$this->MLF_DEF_CROMOSOMICA =$MLF_DEF_CROMOSOMICA;
	$this->MLF_CRO_13 =$MLF_CRO_13;
	$this->MLF_CRO_18 =$MLF_CRO_18;
	$this->MLF_CRO_21 =$MLF_CRO_21;
	$this->MLF_OTROS_DEF =$MLF_OTROS_DEF;
	$this->MLF_OTR_ESQ =$MLF_OTR_ESQ;
	$this->MLF_OTR_HER =$MLF_OTR_HER;
	$this->MLF_OTR_HID =$MLF_OTR_HID;
	$this->MLF_OTR_SEC =$MLF_OTR_SEC;
	$this->MLF_OTR_ERR =$MLF_OTR_ERR;
	$this->MLF_OTR_MIO =$MLF_OTR_MIO;
	$this->MALF_OTROS_CUAL =$MALF_OTROS_CUAL;
	$this->SCORE_NEOCOSUR =$SCORE_NEOCOSUR;
	$this->FALLECE_SALA_PARTO =$FALLECE_SALA_PARTO;
	$this->OBSERVACIONES =$OBSERVACIONES;
	}


	public function setID_NEOCOSUR($ID_NEOCOSUR='')
	{
		$this->ID_NEOCOSUR = $ID_NEOCOSUR;
		return true;
	}

	public function getID_NEOCOSUR()
	{
		return $this->ID_NEOCOSUR;
	}
	
	public function setMLF_NER_ANE($MLF_NER_ANE=''){ 
		
		$this->MLF_NER_ANE = $MLF_NER_ANE;
		return true;		
	}
	
	public function getMLF_NER_ANE(){   
		
		return $this->MLF_NER_ANE;
	}
	
	public function setMLF_NER_MIELO($MLF_NER_MIELO=''){   
		$this->MLF_NER_MIELO = $MLF_NER_MIELO;
		return true;	
	}
	
	public function getMLF_NER_MIELO(){   
		return $this->MLF_NER_MIELO;
	}
	
	public function setMLF_NER_HIDRA($MLF_NER_HIDRA=''){
		$this->MLF_NER_HIDRA = $MLF_NER_HIDRA;
		return true;
	}
	
	public function getMLF_NER_HIDRA(){   
		return $this->MLF_NER_HIDRA;
	}
	public function setMLF_NER_HIDRO($MLF_NER_HIDRO =''){   
		$this->MLF_NER_HIDRO = $MLF_NER_HIDRO;
		return true;
	}
	public function getMLF_NER_HIDRO(){ 
		return $this->MLF_NER_HIDRO;
	}
	
	public function setMLF_NER_HOLO($MLF_NER_HOLO =''){ 
		$this->MLF_NER_HOLO = $MLF_NER_HOLO;
		return true;
	}
	public function getMLF_NER_HOLO(){ 
		return $this->MLF_NER_HOLO;
	}
	
	public function setMLF_DEF_CARDIACOS($MLF_DEF_CARDIACOS =''){ 
		$this->MLF_DEF_CARDIACOS = $MLF_DEF_CARDIACOS;
		return true;
	}
	public function getMLF_DEF_CARDIACOS(){   
		return $this->MLF_DEF_CARDIACOS;  
	}
	
	public function setMLF_CAR_TRON($MLF_CAR_TRON =''){  
		$this->MLF_CAR_TRON  =$MLF_CAR_TRON  ; 
		return true;  
	}
	public function getMLF_CAR_TRON(){    
		return   $this->MLF_CAR_TRON  ; 
	}
	
	public function setMLF_CAR_VAS($MLF_CAR_VAS =''){  
		$this->MLF_CAR_VAS=$MLF_CAR_VAS  ; 
		return true;  
	}
	public function getMLF_CAR_VAS(){    
		return   $this->MLF_CAR_VAS; 
	}
	public function setMLF_CAR_FALL($MLF_CAR_FALL=''){  
		$this->MLF_CAR_FALL=$MLF_CAR_FALL; 
		return true;  
	}
	public function getMLF_CAR_FALL(){    
		return   $this->MLF_CAR_FALL; 
	}
	public function setMLF_CAR_UNI($MLF_CAR_UNI=''){  
		$this->MLF_CAR_UNI=$MLF_CAR_UNI; 
		return true;  
	}
	public function getMLF_CAR_UNI(){    
		return   $this->MLF_CAR_UNI; 
	}
	
	public function setMLF_CAR_DOB($MLF_CAR_DOB =''){  
		$this->MLF_CAR_DOB=$MLF_CAR_DOB;
		return true;  
	}
	public function getMLF_CAR_DOB(){
		return  $this->MLF_CAR_DOB  ;
	}
	public function setMLF_CAR_CAN($MLF_CAR_CAN =''){
		$this->MLF_CAR_CAN=$MLF_CAR_CAN;
		return true;
	}
	
	public function getMLF_CAR_CAN(){
		return   $this->MLF_CAR_CAN;
	}
	public function setMLF_CAR_ATRE($MLF_CAR_ATRE =''){
		$this->MLF_CAR_ATRE  =$MLF_CAR_ATRE  ;
		return true;
	}
	public function getMLF_CAR_ATRE(){
		return   $this->MLF_CAR_ATRE   ;
	}
	public function setMLF_CAR_TRI($MLF_CAR_TRI=''){
		$this->MLF_CAR_TRI  =$MLF_CAR_TRI  ;
		return true;
	}
	public function getMLF_CAR_TRI(){
		return   $this->MLF_CAR_TRI   ; 
	}
	public function setMLF_CAR_HIPO($MLF_CAR_HIPO =''){
		$this->MLF_CAR_HIPO =$MLF_CAR_HIPO  ;
		return true;
	}
	public function getMLF_CAR_HIPO(){
		return   $this->MLF_CAR_HIPO   ; 
	}
	
	public function setMLF_CAR_AORT($MLF_CAR_AORT =''){
		$this->MLF_CAR_AORT  =$MLF_CAR_AORT  ;
		return true; 
	}
	
	public function getMLF_CAR_AORT(){
		return   $this->MLF_CAR_AORT   ; 
	}
	public function setMLF_CAR_ANO($MLF_CAR_ANO =''){  
		$this->MLF_CAR_ANO  =$MLF_CAR_ANO  ;
		return true; 
	}
	public function getMLF_CAR_ANO(){
		return $this->MLF_CAR_ANO ;
	}
	
	public function setMLF_DEF_GASTRO($MLF_DEF_GASTRO =''){
		$this->MLF_DEF_GASTRO  =$MLF_DEF_GASTRO  ; 
		return true;  
	}
	public function getMLF_DEF_GASTRO(){
		return   $this->MLF_DEF_GASTRO   ; 
	}
	
	public function setMLF_GST_PAL($MLF_GST_PAL =''){
		$this->MLF_GST_PAL  =$MLF_GST_PAL  ;
		return true;  
	}
	public function getMLF_GST_PAL(){
		return   $this->MLF_GST_PAL   ; 
	}
	public function setMLF_GST_FIS($MLF_GST_FIS =''){
		$this->MLF_GST_FIS  =$MLF_GST_FIS  ;
		return true;  
	}
	
	public function getMLF_GST_FIS(){
		return   $this->MLF_GST_FIS   ;
	}
	
	public function setMLF_GST_DUO($MLF_GST_DUO =''){
		$this->MLF_GST_DUO =$MLF_GST_DUO  ;
		return true;  
	}
	public function getMLF_GST_DUO(){
		return   $this->MLF_GST_DUO   ; 
	}
	
	public function setMLF_GST_YEY($MLF_GST_YEY =''){
		$this->MLF_GST_YEY  =$MLF_GST_YEY  ;
		return true;  
	}
	public function getMLF_GST_YEY(){
		return   $this->MLF_GST_YEY   ; 
	}
	
	public function setMLF_GST_LLE($MLF_GST_LLE =''){
		$this->MLF_GST_LLE  =$MLF_GST_LLE  ;
		return true;  
	}
	public function getMLF_GST_LLE(){
		return   $this->MLF_GST_LLE   ;
	}
	public function setMLF_GST_REC($MLF_GST_REC =''){
		$this->MLF_GST_REC  =$MLF_GST_REC  ;
		return true;  
	}
	public function getMLF_GST_REC(){
		return   $this->MLF_GST_REC   ; 
	}
	public function setMLF_GST_ANO($MLF_GST_ANO =''){
		$this->MLF_GST_ANO  =$MLF_GST_ANO  ;
		return true;
	}
	public function getMLF_GST_ANO(){
		return   $this->MLF_GST_ANO   ; 
	}
	public function setMLF_GST_ONF($MLF_GST_ONF =''){
		$this->MLF_GST_ONF  =$MLF_GST_ONF  ;
		return true;
	}
	public function getMLF_GST_ONF(){
		return   $this->MLF_GST_ONF   ;
	}
	public function setMLF_GST_GAS($MLF_GST_GAS =''){
		$this->MLF_GST_GAS  =$MLF_GST_GAS  ;
		return true;
	}
	public function getMLF_GST_GAS(){
		return   $this->MLF_GST_GAS   ;
	}
	public function setMLF_DEF_URINARIOS($MLF_DEF_URINARIOS =''){
		$this->MLF_DEF_URINARIOS  =$MLF_DEF_URINARIOS  ;
		return true;  
	}
	public function getMLF_DEF_URINARIOS(){
		return   $this->MLF_DEF_URINARIOS   ; 
	}
	public function setMLF_URI_AGE($MLF_URI_AGE =''){
		$this->MLF_URI_AGE  =$MLF_URI_AGE  ;
		return true;
	}
	
	public function getMLF_URI_AGE(){
		return   $this->MLF_URI_AGE   ;
	}
	public function setMLF_URI_DIS($MLF_URI_DIS =''){
		$this->MLF_URI_DIS  =$MLF_URI_DIS  ;
		return true;
	}
	public function getMLF_URI_DIS(){
		return   $this->MLF_URI_DIS   ;
	}
	public function setMLF_URI_URO($MLF_URI_URO =''){
		$this->MLF_URI_URO  =$MLF_URI_URO  ;
		return true;
	}
	public function getMLF_URI_URO(){    
		return   $this->MLF_URI_URO   ;
	}
	public function setMLF_URI_ECT($MLF_URI_ECT =''){
		$this->MLF_URI_ECT  =$MLF_URI_ECT  ;
		return true; 
	}
	public function getMLF_URI_ECT(){
		return   $this-> MLF_URI_ECT  ; 
	}
	public function setMLF_DEF_CROMOSOMICA($MLF_DEF_CROMOSOMICA =''){
		$this->MLF_DEF_CROMOSOMICA  =$MLF_DEF_CROMOSOMICA  ;
		return true;
	}
	public function getMLF_DEF_CROMOSOMICA(){
		return   $this->MLF_DEF_CROMOSOMICA   ; 
	}
	public function setMLF_CRO_13($MLF_CRO_13 =''){
		$this->MLF_CRO_13  =$MLF_CRO_13  ;
		return true;
	}
	public function getMLF_CRO_13(){
		return   $this->MLF_CRO_13   ;
	}
	public function setMLF_CRO_18($MLF_CRO_18 =''){
		$this->MLF_CRO_18  =$MLF_CRO_18  ; 
		return true;  
	}
	public function getMLF_CRO_18(){
		return   $this->MLF_CRO_18   ;
	}
	
	public function setMLF_CRO_21($MLF_CRO_21 =''){
		$this->MLF_CRO_21  =$MLF_CRO_21  ;
		return true;
	}
	
	public function getMLF_CRO_21(){
		return   $this->MLF_CRO_21   ;
	}
	public function setMLF_OTROS_DEF($MLF_OTROS_DEF =''){
		$this->MLF_OTROS_DEF  =$MLF_OTROS_DEF  ;
		return true;
	}
	public function getMLF_OTROS_DEF(){
		return   $this->MLF_OTROS_DEF   ;
	}
	public function setMLF_OTR_ESQ($MLF_OTR_ESQ =''){
		$this->MLF_OTR_ESQ  =$MLF_OTR_ESQ  ;
		return true;
	}
	public function getMLF_OTR_ESQ(){
		return   $this->MLF_OTR_ESQ   ; 
	}
	
	public function setMLF_OTR_HER($MLF_OTR_HER =''){
		$this->MLF_OTR_HER  =$MLF_OTR_HER  ; 
		return true;  
	}
	public function getMLF_OTR_HER(){
		return   $this->MLF_OTR_HER   ; 
	}
	
	public function setMLF_OTR_HID($MLF_OTR_HID =''){
		$this->MLF_OTR_HID  =$MLF_OTR_HID  ;
		return true;
	}
	public function getMLF_OTR_HID(){
		return   $this->MLF_OTR_HID  ; 
	}
	
	public function setMLF_OTR_SEC($MLF_OTR_SEC =''){
		$this->MLF_OTR_SEC  =$MLF_OTR_SEC  ;
		return true;  
	}
	public function getMLF_OTR_SEC(){
		return   $this->MLF_OTR_SEC ; 
	}
	
	public function setMLF_OTR_ERR($MLF_OTR_SEC =''){
		$this->MLF_OTR_SEC  =$MLF_OTR_SEC  ;
		return true; 
	}
	public function getMLF_OTR_ERR(){
		return   $this->MLF_OTR_SEC   ; 
	}
	public function setMLF_OTR_MIO($MLF_OTR_MIO =''){
		$this->MLF_OTR_MIO  =$MLF_OTR_MIO  ;
		return true;
	}
	public function getMLF_OTR_MIO(){
		return   $this->MLF_OTR_MIO   ; 
	}
	public function setMALF_OTROS_CUAL($MALF_OTROS_CUAL =''){
		$this->MALF_OTROS_CUAL  =$MALF_OTROS_CUAL  ;
		return true;
	}
	public function getMALF_OTROS_CUAL(){
		return   $this->MALF_OTROS_CUAL   ;
	}
	
	public function setOXIGENO_FLUJO_LIBRE($OXIGENO_FLUJO_LIBRE='')
	{
		$this->OXIGENO_FLUJO_LIBRE = $OXIGENO_FLUJO_LIBRE;
		return true;
	}

	
	public function getOXIGENO_FLUJO_LIBRE()
	{
		return $this->OXIGENO_FLUJO_LIBRE;
	}


	public function setVENTILACION_MASC($VENTILACION_MASC='')
	{
		$this->VENTILACION_MASC = $VENTILACION_MASC;
		return true;
	}

	public function getVENTILACION_MASC()
	{
		return $this->VENTILACION_MASC;
	}


	public function setINTUBACION($INTUBACION='')
	{
		$this->INTUBACION = $INTUBACION;
		return true;
	}

	public function getINTUBACION()
	{
		return $this->INTUBACION;
	}

	public function setMASAJE_CARDIACO($MASAJE_CARDIACO='')
	{
		$this->MASAJE_CARDIACO = $MASAJE_CARDIACO;
		return true;
	}

	public function getMASAJE_CARDIACO()
	{
		return $this->MASAJE_CARDIACO;
	}

	public function setADRENALINA($ADRENALINA='')
	{
		$this->ADRENALINA = $ADRENALINA;
		return true;
	}

	public function getADRENALINA()
	{
		return $this->ADRENALINA;
	}

	
	public function setMLF_MAYOR($MLF_MAYOR='')
	{
		$this->MLF_MAYOR = $MLF_MAYOR;
		return true;
	}
	public function getMLF_MAYOR()
	{
		return $this->MLF_MAYOR;
	}
	
	
	public function setMLF_COMPROMETE_VIDA($MLF_COMPROMETE_VIDA='')
	{
		$this->MLF_COMPROMETE_VIDA = $MLF_COMPROMETE_VIDA;
		return true;
	}
	
	public function getMLF_COMPROMETE_VIDA()
	{
		return $this->MLF_COMPROMETE_VIDA;
	}
	
	
	public function setMLF_NERVIOSO_CENTRAL($MLF_NERVIOSO_CENTRAL='')
	{
		$this->MLF_NERVIOSO_CENTRAL = $MLF_NERVIOSO_CENTRAL;
		return true;
	}

	public function getMLF_NERVIOSO_CENTRAL()
	{
		return $this->MLF_NERVIOSO_CENTRAL;
	} 

	public function setSCORE_NEOCOSUR($SCORE_NEOCOSUR='')
	{
		$this->SCORE_NEOCOSUR = $SCORE_NEOCOSUR;
		return true;
	}

	public function getSCORE_NEOCOSUR()
	{
		return $this->SCORE_NEOCOSUR;
	}

	public function setFALLECE_SALA_PARTO($FALLECE_SALA_PARTO='')
	{
		$this->FALLECE_SALA_PARTO = $FALLECE_SALA_PARTO;
		return true;
	}

	public function getFALLECE_SALA_PARTO()
	{
		return $this->FALLECE_SALA_PARTO;
	}
	public function setOBSERVACIONES($OBSERVACIONES =''){
		$this->OBSERVACIONES  =$OBSERVACIONES  ;
		return true;
	}
	public function getOBSERVACIONES(){
		return   $this->OBSERVACIONES   ; 
	}
	
	

} // END class antecedentes_parto