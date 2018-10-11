<?php

/******************************************************************************
* Class for neocosur.cirugia
*******************************************************************************/

class centro
{
private  $c_id_centro;
private  $c_fecha_crea;
private  $c_nombre;
private  $c_cod_centro;
private  $c_id_pais;
private  $c_universidad;
private  $c_tipo;
private  $c_est_total_plaza;
private  $c_est_total_parto;
private  $c_est_morta_neona;
private  $c_est_plaza_uci;
private  $c_est_parto_1500;
private  $c_est_morta_1500;
private  $c_re_frecuencia;
private  $c_re_oxido;
private  $c_re_cir_general;
private  $c_re_cir_cardiaca;
private  $c_seg_neo;
private  $c_seg_dura;
private  $c_seg_nino; 
private  $c_seg_ofta;
private  $c_seg_otorri;
private  $c_seg_neuro;
private  $c_seg_bronco;
private  $c_seg_fono;
private  $c_seg_kine;
private  $c_seg_oxi;
private  $c_activo;
private $c_fecha_mod;
private $c_fecha_mod_admin;
	
	function __construct()
	 	{
	 		

	 	}

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

}  //  $END  $class  $cirugia