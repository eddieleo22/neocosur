<?php

/******************************************************************************
* Class for neocosur.evaluacion_neurodesarrollo
*******************************************************************************/

class evaluacion_neurodesarrollo
{
private $ID_CONTROL								;
 
//evaluacion_neurodesarrollo

		private $HIC_40_SEMANA							;
		private $ID_HIC_40_GRADO						;
		private $LPV_40SEMANAS							;
		private $ROP_40_SEMANAS							;
		private $ROP_40_SEMANAS_GRADO					;
		private $BERA_40SEMANAS							;

		//SITUACION  NEURODESARROLLO DOS AÑOS
		private $NEUROLOGICA_2_VISION					;
		private $NEUROLOGICA_2_VISION_CEGUERA			;
		private $NEUROLOGICA_2_VISION_ESTRABISMO		;
		private $NEUROLOGICA_2_VISION_REFRACCION		;
		private $NEUROLOGICA_2_AUDICION					;
		private $NEUROLOGICA_2_AUDICION_NO				;
		private $NEUROLOGICA_2_MOTORA					;
		private $NEUROLOGICA_2_PARALISIS				;
		private $NEUROLOGICA_2_PARALISIS_SI				;
		private $NEUROLOGICA_2_COGNITIVA				;
		private $NEUROLOGICA_2_OTROS					;
		private $NEUROLOGICA_2_OTROS_CONVULSIVO			;
		private $NEUROLOGICA_2_OTROS_HIDROCEFALIA		;

		private $PSICOMOTOR_2_EXAMEN					;
		private $PSICOMOTOR_2_EX_HIPO					;
		private $PSICOMOTOR_2_EX_HIPER					;
		private $PSICOMOTOR_2_EX_FOCA					;
		private $PSICOMOTOR_2_EXA_HEMI					;

		private $PSICOMOTOR_2_AUDITIVA_SEN				;
		private $PSICOMOTOR_2_AUDITIVA_SEN_HIPO			;
		private $PSICOMOTOR_2_AUDITIVA_SEN_VISUAL		;
		private $PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA		;
		private $PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA_DESCI;
		private $PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA		;
		private $PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA_SI	;
		private $PSICOMOTOR_2_AUDITIVA_OTRO_CEFALIA		;
		private $PSICOMOTOR_2_AUDITIVA_OTRO_SINDRO		;
		private $PSICOMOTOR_2_AUDITIVA_OTRO_ALTERA		;
		private $PSICOMOTOR_2_AUDITIVA_NEURO			;


		private $PSICOMOTOR_A2ANIOS_MESES				;
		private $PSICOMOTOR_A2ANIOS_EEDP_CUAL			;
		private $PSICOMOTOR_A2ANIOS_EEDP_FECHA			;
		private $PSICOMOTOR_A2ANIOS_EEDP_ANIOS			;
		private $PSICOMOTOR_A2ANIOS_EEDP_MESES			;
		private $PSICOMOTOR_A2ANIOS_EEDP_PUNTAJE		;
		private $PSICOMOTOR_A2ANIOS_EEDP_NORMAL			;
		private $PSICOMOTOR_A2ANIOS_EEDP_OBSERVACION	;

		private $PSICOMOTOR_A2ANIOS_EAIS_CUAL			;
		private $PSICOMOTOR_A2ANIOS_EAIS_FECHA			;
		private $PSICOMOTOR_A2ANIOS_EAIS_ANIOS			;
		private $PSICOMOTOR_A2ANIOS_EAIS_MESES			;
		private $PSICOMOTOR_A2ANIOS_EAIS_PUNTAJE		;
		private $PSICOMOTOR_A2ANIOS_EAIS_NORMAL			;
		private $PSICOMOTOR_A2ANIOS_EAIS_OBSERVACION	;


		private $PSICOMOTOR_A2ANIOS_CAT_CUAL			;
		private $PSICOMOTOR_A2ANIOS_CAT_FECHA			;
		private $PSICOMOTOR_A2ANIOS_CAT_ANIOS			;
		private $PSICOMOTOR_A2ANIOS_CAT_MESES			;
		private $PSICOMOTOR_A2ANIOS_CAT_PUNTAJE			;
		private $PSICOMOTOR_A2ANIOS_CAT_NORMAL			;
		private $PSICOMOTOR_A2ANIOS_CAT_OBSERVACION		;



		private $PSICOMOTOR_A2ANIOS_ASQ_CUAL			;
		private $PSICOMOTOR_A2ANIOS_ASQ_FECHA			;
		private $PSICOMOTOR_A2ANIOS_ASQ_ANIOS			;
		private $PSICOMOTOR_A2ANIOS_ASQ_MESES			;
		private $PSICOMOTOR_A2ANIOS_ASQ_PUNTAJE			;
		private $PSICOMOTOR_A2ANIOS_ASQ_NORMAL			;
		private $PSICOMOTOR_A2ANIOS_ASQ_OBSERVACION		;


		private $PSICOMOTOR_2A7ANIOS_TEPSI			;
		private $PSICOMOTOR_2A7ANIOS_TEP_NORMAL			;
		private $PSICOMOTOR_2A7ANIOS_TEP_FECHA			;
		private $PSICOMOTOR_2A7ANIOS_TEP_ANIOS			;
		private $PSICOMOTOR_2A7ANIOS_TEP_MESES			;
		private $PSICOMOTOR_2A7ANIOS_TEP_PUNTAJE		;
		private $PSICOMOTOR_2A7ANIOS_BAYLE				;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VERSION		;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_MENTAL	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_CONDUCTA	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_COGNI_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_LENG_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_SOCIO_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_COMPOR_3	;
		private $PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL_3	;

		private $PSICOMOTOR_A3ANIOS_RET_LENG			;
		private $PSICOMOTOR_A3ANIOS_RET_LENG_TIPO		;
		private $PSICOMOTOR_A3ANIOS_RET_LENG_REHAB		;
		private $PSICOMOTOR_3ANIOS_RET_EXPRESIVO		;
		private $PSICOMOTOR_3ANIOS_RET_EXPRESIVO_REHAB	;

		private $PSICOMOTOR_2A4ANIOS_COEFICIENTE		;
		private $PSICOMOTOR_2A4ANIOS_COE_FECHA_1		;
		private $PSICOMOTOR_2A4ANIOS_COE_ANIOS_1		;
		private $PSICOMOTOR_2A4ANIOS_COE_MESES_1		;
		private $PSICOMOTOR_2A4ANIOS_COE_VERB_1			;
		private $PSICOMOTOR_2A4ANIOS_COE_MANIPU_1		;
		private $PSICOMOTOR_2A4ANIOS_COE_TOTAL_1		;
		private $PSICOMOTOR_2A4ANIOS_COE_FECHA_2		;
		private $PSICOMOTOR_2A4ANIOS_COE_ANIOS_2		;
		private $PSICOMOTOR_2A4ANIOS_COE_MESES_2		;
		private $PSICOMOTOR_2A4ANIOS_COE_VERB_2			;
		private $PSICOMOTOR_2A4ANIOS_COE_MANIPU_2		;
		private $PSICOMOTOR_2A4ANIOS_COE_PROCESA_2		;
		private $PSICOMOTOR_2A4ANIOS_COE_LENGUAJE_2		;
		private $PSICOMOTOR_2A4ANIOS_OTRO_MSCA			;
		private $PSICOMOTOR_2A4ANIOS_OTRO_SCQ			;
		private $PSICOMOTOR_2A4ANIOS_OTRO_MCHAT			;
		private $PSICOMOTOR_2A4ANIOS_OTRO_VABS			;
		private $PSICOMOTOR_2A4ANIOS_OTRO_GMFCS			;
		private $PSICOMOTOR_2A4ANIOS_OTRO_OBSERV		;

		private $NEURODESAROLLO_2ANIOS_MOTORA			;
		private $NEURODESAROLLO_2ANIOS_MOTORA_NIVEL		;
		private $NEURODESAROLLO_2ANIOS_PARALISIS		;
		private $NEURODESAROLLO_2ANIOS_PARALISIS_CUAL	;
		private $NEURODESAROLLO_2ANIOS_OTROS_TRANSTORNOS;
		private $NEURODESAROLLO_2ANIOS_OTROS_LENGUAJE	;
		private $NEURODESAROLLO_2ANIOS_OTROS_APRENDIZAJE;

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
		
		// END class evaluacion_neurodesarrollo
}