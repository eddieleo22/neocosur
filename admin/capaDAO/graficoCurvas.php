<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class graficoCurvasDAO
{
    
    public $conexionDao;
	public $id;	
	function __construct($cone)
	{
		$this->conexionDao = $cone;			
	}

	public function setId($id='')
	{
		$this->id = $id;
		return true;
	}

	public function getId()
	{
		return $this->id;
	}
	
	
	public function queryCurvasPesoEdad($idNeocosur,$centro)
	{           
	
		$peso_edad_hasta_2 ="SELECT  peso, edad_corre_en_meses FROM vista_GraficoCurvas AS a
		INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR WHERE a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " 
			and (edad_crono_en_meses < 24 and peso >=1500 and edad_corre_en_meses<>'' or (Corre_anos=2 and Corre_meses=0)) 
				order by peso asc, edad_corre_en_meses asc";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($peso_edad_hasta_2);						
		
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function queryCurvas_Peso_Edad_2_5($idNeocosur,$centro)
	{
      $peso_edad_de_2_a_5 ="
(SELECT peso, edad_crono_en_meses as edad_corre_en_meses FROM vista_GraficoCurvas AS a
INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
WHERE 
a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " and edad_corre_en_meses >= 24 
and edad_corre_en_meses <= 60 order by peso asc, edad_corre_en_meses asc) 
UNION 
(SELECT peso, edad_crono_en_meses as edad_corre_en_meses FROM vista_GraficoCurvas AS a
INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
WHERE a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. "
	and (edad_corre_en_meses >= 24 and edad_corre_en_meses <= 60 or (Corre_anos=2 and Corre_meses=0) )
	order by peso asc, edad_corre_en_meses asc)
";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($peso_edad_de_2_a_5);						
		
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	//
	public function queryCurvasPeso_edad_menos_5($idNeocosur,$centro)
	{
        $peso_edad_menos_5=" 
	(SELECT  peso, edad_corre_en_meses FROM vista_GraficoCurvas AS a
	INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
	WHERE 
			a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " 
			and crono_anos <= 2 and edad_corre_en_meses < 24 and edad_corre_en_meses<>'' 
			order by peso asc, edad_corre_en_meses asc) 
	UNION 
(	SELECT  peso, edad_crono_en_meses as edad_corre_en_meses FROM vista_GraficoCurvas AS a
	INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
	WHERE 
			a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " and crono_anos >= 2  
			and edad_corre_en_meses <= 60 and edad_corre_en_meses<>'' 
			order by peso asc, edad_corre_en_meses asc)
	";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($peso_edad_menos_5);						
		
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function queryCurvasPeso_x_Estatura_2anios($idNeocosur,$centro)
	{
		$peso_x_longitud = "
	SELECT  peso, talla FROM vista_GraficoCurvas AS a
		INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
		WHERE 
			a.bas_ide_neocosur = ". $idNeocosur. " and  id_centro = ". $centro. " 
			and (edad_corre_en_meses <= 24  and edad_corre_en_meses<>'' or (Corre_anos=2 and Corre_meses=0))
			order by peso asc, talla asc";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($peso_x_longitud);	;
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function queryCurvasPeso_x_Estatura($idNeocosur,$centro)
	{		
		 $peso_x_estatura = "SELECT  peso, talla FROM vista_GraficoCurvas AS a
							INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR
				WHERE a.bas_ide_neocosur = ". $idNeocosur. " and id_centro = ". $centro. "
				and (edad_corre_en_meses >= 24 and edad_corre_en_meses <= 60 and edad_corre_en_meses<>'' or (Corre_anos=2 and Corre_meses=0)) 
				order by peso asc, talla asc";	
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($peso_x_estatura);	;
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	// TALLA POR EDAD  2 a 5  
	public function queryCurvas_Talla_Edad($idNeocosur,$centro)
	{
		 $long_estat_edad_2_a_5 = "(SELECT talla, edad_crono_en_meses as edad_corre_en_meses FROM vista_GraficoCurvas AS a
							INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
							WHERE 
							a.bas_ide_neocosur = ". $idNeocosur. " and  id_centro = ". $centro. "
							and edad_corre_en_meses >= 24 
							and (edad_corre_en_meses <= 60 and edad_corre_en_meses<>'' or (Corre_anos=2 and Corre_meses=0)  )
							order by talla asc, edad_corre_en_meses asc)";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($long_estat_edad_2_a_5);	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	// #longitud/estatura x edad queryCurvas_Longitud_Edad 
	public function queryCurvas_Longitud_Edad($idNeocosur,$centro)
	{
		$long_estat_edad_hasta_2 ="SELECT talla, edad_corre_en_meses  FROM vista_GraficoCurvas AS a
						INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
						WHERE a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. "
						and crono_anos <= 2 and edad_corre_en_meses<>'' order by talla asc, edad_corre_en_meses asc";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($long_estat_edad_hasta_2);		
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	
	// #longitud/estatura x edad queryCurvas_IMC_Edad
	public function queryCurvas_IMC_Edad($idNeocosur,$centro)
	{ 
		
		$IMC_x_edad =" (SELECT  IMC, edad_corre_en_meses FROM vista_GraficoCurvas AS a
					INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
					WHERE 
					a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " 
					and crono_anos < 2 and  edad_corre_en_meses < 24 and edad_corre_en_meses<>'' 
					order by edad_corre_en_meses asc, IMC asc )
					UNION 
				(SELECT  IMC, edad_crono_en_meses as edad_corre_en_meses FROM vista_GraficoCurvas AS a
					INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
					WHERE a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " 
					and crono_anos >= 2  and edad_corre_en_meses <= 60 and edad_corre_en_meses<>'' 
					order by edad_corre_en_meses asc, IMC asc)";	
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($IMC_x_edad);
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	//queryCurvas_CC_x_edad
	public function queryCurvas_CC_x_edad($idNeocosur,$centro)
	{		
		$CC_x_edad ="(	SELECT  Craneo, edad_corre_en_meses FROM vista_GraficoCurvas AS a
					INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
				WHERE 
					a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " 
					and crono_anos < 2 and  edad_corre_en_meses < 24 and  edad_corre_en_meses<>'' 
					order by edad_corre_en_meses asc, Craneo asc)
				UNION 
				(SELECT  Craneo, edad_crono_en_meses as edad_corre_en_meses 
					FROM vista_GraficoCurvas AS a
					INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
				WHERE 
					a.bas_ide_neocosur = ". $idNeocosur. " and   id_centro = ". $centro. " 
					and crono_anos >= 2  and edad_corre_en_meses <= 60 and edad_corre_en_meses<>'' 
					order by edad_corre_en_meses asc, Craneo asc)";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($CC_x_edad);	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	
	public function queryCurvas($idNeocosur,$centro,$filtro,$idSeg)
	{
            
		 $query = "SELECT  IMC, edad_crono_en_meses FROM vista_graficocurvas AS a
				INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR      
				where a.bas_ide_neocosur = ". $idNeocosur. "   and  id_centro = ".$centro." 
					and  $filtro  ";
            
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);		
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function queryTabla($idNeocosur)
	{
            
		 $query = "SELECT * 
							FROM vista_graficocurvas AS a
							INNER JOIN antropometria AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR
							WHERE  a.bas_ide_neocosur = ". $idNeocosur ." 
							ORDER BY peso ASC , talla ASC , craneo ASC ";
            
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function queryCurvasUnion ($idNeocosur,$centro,$filtro1,$filtro2,$idSeg)
	{
            
		 $query = "SELECT  IMC, edad_crono_en_meses FROM vista_graficocurvas AS a
				INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR  
				inner join usuario as us  on 	us.us_id_user=b.ID_RESPONSABLE_INGRESO_DATOS 
				inner join centro as c  on c.c_id_centro=us.us_id_centro  
				where  $filtro1  and a.bas_ide_neocosur = ". $idNeocosur." 
				union 
				SELECT  IMC, edad_crono_en_meses FROM vista_graficocurvas AS a
				INNER JOIN ingreso AS b ON a.bas_ide_neocosur = b.ID_NEOCOSUR 
				inner join usuario as us  on 	us.us_id_user=b.ID_RESPONSABLE_INGRESO_DATOS 
				inner join centro as c  on c.c_id_centro=us.us_id_centro  
				where  $filtro2   and  a.bas_ide_neocosur = ". $idNeocosur;
            
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	
	
}