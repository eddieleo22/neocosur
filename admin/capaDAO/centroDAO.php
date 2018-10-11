<?php


class centroDAO
{
	private $conexionDao;
	private $id;	
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
	
	
	public function guarda($centro)
	{
		$query ="insert into centro(
				 c_fecha_crea,
				 c_nombre,
				 c_cod_centro,
				 c_id_pais,
				 c_universidad,
				 c_tipo,
				 c_est_total_plaza,
				 c_est_total_parto,
				 c_est_morta_neona,
				 c_est_plaza_uci,
				 c_est_parto_1500,
				 c_est_morta_1500,
				 c_re_frecuencia,
				 c_re_oxido,
				 c_re_cir_general,
				 c_re_cir_cardiaca,
				 c_seg_neo,
				 c_seg_dura,
				 c_seg_nino, 
				 c_seg_ofta,
				 c_seg_otorri,
				 c_seg_neuro,
				 c_seg_bronco,
				 c_seg_fono,
				 c_seg_kine,
				 c_seg_oxi,
				 c_fecha_mod_admin,
				 c_activo
	 )
	 VALUES (
		'" . $centro->c_fecha_crea. "',
		'" . $centro->c_nombre. "',
		'" . $centro->c_cod_centro. "',
		'" . $centro->c_id_pais. "',
		'" . $centro->c_universidad. "',
		'" . $centro->c_tipo. "',
		'" . $centro->c_est_total_plaza. "',
		'" . $centro->c_est_total_parto. "',
		'" . $centro->c_est_morta_neona. "',
		'" . $centro->c_est_plaza_uci. "',
		'" . $centro->c_est_parto_1500. "',
		'" . $centro->c_est_morta_1500. "',
		'" . $centro->c_re_frecuencia. "',
		'" . $centro->c_re_oxido. "',
		'" . $centro->c_re_cir_general. "',
		'" . $centro->c_re_cir_cardiaca. "',
		'" . $centro->c_seg_neo. "',
		'" . $centro->c_seg_dura. "',
		'" . $centro->c_seg_nino. "', 
		'" . $centro->c_seg_ofta. "',
		'" . $centro->c_seg_otorri. "',
		'" . $centro->c_seg_neuro. "',
		'" . $centro->c_seg_bronco. "',
		'" . $centro->c_seg_fono. "',
		'" . $centro->c_seg_kine. "',
		'" . $centro->c_fecha_mod_admin. "',
		'" . $centro->c_seg_oxi. "',
		'1');";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	public function actualizarIdenti($centro)
	{
		 $query = "update centro SET 
				c_fecha_crea='" . $centro->c_fecha_crea. "',
				c_nombre='" . $centro->c_nombre. "',
				c_cod_centro='" . $centro->c_cod_centro. "',
				c_id_pais='" . $centro->c_id_pais. "',
				c_universidad='" . $centro->c_universidad. "',
				c_tipo='" . $centro->c_tipo. "'
				 WHERE `c_id_centro`=".$centro->c_id_centro."";
				
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;		
	}
	
	public function actualizarEstadi($centro){
		
		$query=" update centro SET 
				c_est_total_plaza='" . $centro->c_est_total_plaza. "',
				c_est_total_parto='" . $centro->c_est_total_parto. "',
				c_est_morta_neona='" . $centro->c_est_morta_neona. "',
				c_est_plaza_uci='" . $centro->c_est_plaza_uci. "',
				c_est_parto_1500='" . $centro->c_est_parto_1500. "',
				c_est_morta_1500='" . $centro->c_est_morta_1500. "'
				 WHERE `c_id_centro`=".$centro->c_id_centro."";
				

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	public function actualizarRecu($centro){
		
		$query=" update centro SET 
				c_re_frecuencia='" . $centro->c_re_frecuencia. "',
				c_re_oxido='" . $centro->c_re_oxido. "',
				c_re_cir_general='" . $centro->c_re_cir_general. "',
				c_re_cir_cardiaca='" . $centro->c_re_cir_cardiaca. "',
				c_seg_neo='" . $centro->c_seg_neo. "',
				c_seg_dura='" . $centro->c_seg_dura. "',
				c_seg_nino= '" . $centro->c_seg_nino. "', 
				c_seg_ofta='" . $centro->c_seg_ofta. "',
				c_seg_otorri='" . $centro->c_seg_otorri. "',
				c_seg_neuro='" . $centro->c_seg_neuro. "',
				c_seg_bronco='" . $centro->c_seg_bronco. "',
				c_seg_fono='" . $centro->c_seg_fono. "',
				c_seg_kine='" . $centro->c_seg_kine. "',
				c_seg_oxi='" . $centro->c_seg_oxi. "',
				c_seg_oxi='" . $centro-> $c_fecha_mod_admin. "',
				c_fecha_mod='" . $centro->c_fecha_mod. "'
				 WHERE `c_id_centro`=".$centro->c_id_centro."";
				

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	public function actualizarSegui($centro){
		
		$query=" update centro SET 
		
		
				c_seg_neo='" . $centro->c_seg_neo. "',
				c_seg_dura='" . $centro->c_seg_dura. "',
				c_seg_nino= '" . $centro->c_seg_nino. "', 
				c_seg_ofta='" . $centro->c_seg_ofta. "',
				c_seg_otorri='" . $centro->c_seg_otorri. "',
				c_seg_neuro='" . $centro->c_seg_neuro. "',
				c_seg_bronco='" . $centro->c_seg_bronco. "',
				c_seg_fono='" . $centro->c_seg_fono. "',
				c_seg_kine='" . $centro->c_seg_kine. "',
				c_seg_oxi='" . $centro->c_seg_oxi. "',
				c_fecha_mod='" . $centro->c_fecha_mod. "'
				 WHERE `c_id_centro`=".$centro->c_id_centro."";
				
		// "query ..> ".$query; die;
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
	function actualizar($centro){
		
		$query=" update centro SET 
				c_fecha_crea='" . $centro->c_fecha_crea. "',
				c_nombre='" . $centro->c_nombre. "',
				c_cod_centro='" . $centro->c_cod_centro. "',
				c_id_pais='" . $centro->c_id_pais. "',
				c_universidad='" . $centro->c_universidad. "',
				c_tipo='" . $centro->c_tipo. "',
		c_est_total_plaza='" . $centro->c_est_total_plaza. "',
				c_est_total_parto='" . $centro->c_est_total_parto. "',
				c_est_morta_neona='" . $centro->c_est_morta_neona. "',
				c_est_plaza_uci='" . $centro->c_est_plaza_uci. "',
				c_est_parto_1500='" . $centro->c_est_parto_1500. "',
				c_est_morta_1500='" . $centro->c_est_morta_1500. "',
				
		c_re_frecuencia='" . $centro->c_re_frecuencia. "',
				c_re_oxido='" . $centro->c_re_oxido. "',
				c_re_cir_general='" . $centro->c_re_cir_general. "',
				c_re_cir_cardiaca='" . $centro->c_re_cir_cardiaca. "',
				c_seg_neo='" . $centro->c_seg_neo. "',
				c_seg_dura='" . $centro->c_seg_dura. "',
				c_seg_nino= '" . $centro->c_seg_nino. "', 
				c_seg_ofta='" . $centro->c_seg_ofta. "',
				c_seg_otorri='" . $centro->c_seg_otorri. "',
				c_seg_neuro='" . $centro->c_seg_neuro. "',
				c_seg_bronco='" . $centro->c_seg_bronco. "',
				c_seg_fono='" . $centro->c_seg_fono. "',
				c_seg_kine='" . $centro->c_seg_kine. "',
				c_seg_oxi='" . $centro->c_seg_oxi. "',
				c_fecha_mod='" . $centro->c_fecha_mod. "',
		
				c_seg_neo='" . $centro->c_seg_neo. "',
				c_seg_dura='" . $centro->c_seg_dura. "',
				c_seg_nino= '" . $centro->c_seg_nino. "', 
				c_seg_ofta='" . $centro->c_seg_ofta. "',
				c_seg_otorri='" . $centro->c_seg_otorri. "',
				c_seg_neuro='" . $centro->c_seg_neuro. "',
				c_seg_bronco='" . $centro->c_seg_bronco. "',
				c_seg_fono='" . $centro->c_seg_fono. "',
				c_seg_kine='" . $centro->c_seg_kine. "',
				c_seg_oxi='" . $centro->c_seg_oxi. "',
				c_fecha_mod_admin='" . $centro->c_fecha_mod_admin. "',
				c_fecha_mod='" . $centro->c_fecha_mod. "'
				 WHERE `c_id_centro`=".$centro->c_id_centro."";
		
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
		
	}
	
	public function buscarId($id)
	{
		 $query = "SELECT * FROM centro WHERE `c_id_centro`=".$id;
		$this->conexionDao->Abrir();
		$resultado = $this->conexionDao->select($query);
					
		$row = $resultado->fetch_assoc();	
		 
		$this->conexionDao->Cerrar();
		
		return $row;
	}
	
	public function listar($filtro)
	{
		 $query = "SELECT * FROM centro 
		 where c_activo= '1' 
			$filtro ";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$this->conexionDao->Cerrar();
		return $retorno;
	
	}
	
	
	public function rescataNombre()
	{
		 $query = "SELECT c.*, p.descripcion FROM centro c 
					inner join pais p on  p.id_Pais=c.c_id_pais";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	public function rescataNombrePorIdFicha($idNeocosur)
	{
		 $query = "SELECT c.*  FROM centro c 
					inner join ingreso i on  i.ID_CENTRO=c.c_id_centro
					where i.ID_NEOCOSUR= ".$idNeocosur." ;";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();	
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	
	public function centroActu(){
		 $query1="
		
		SELECT DAY( c_fecha_mod ) AS colab_dia,
			 MONTH( c_fecha_mod ) AS colab_mes, 
			 YEAR( c_fecha_mod ) AS colab_ano, 
			 DAY( c_fecha_mod_admin ) AS admin_dia, 
			 MONTH( c_fecha_mod_admin ) AS admin_mes, 
			 YEAR( c_fecha_mod_admin ) AS admin_ano, 
			 c_fecha_mod, c_fecha_mod_admin
			FROM centro
		";
	
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query1);	
		$this->conexionDao->Cerrar(); 

		$results = $retorno->fetch_array();

						 $centro_act=0;
							 $centro_act2=0;
							 $total=0;


						  foreach ($results as $item){
							if ($item["colab_ano"]!=0){
							date_default_timezone_set('America/Santiago');
									$Fecha = getdate();
									 $mes_now = $Fecha["mon"];
									$this->mes_now =$mes_now;									 
									$ano_now =$Fecha["year"];
									 $mes_now =$Fecha["mon"];
									 //centros actualizados y no revisados
									 if (($item["admin_ano"] == $item["colab_ano"]) and ($item["CENTRO_ACTUALIZADO"]>$item["ADMIN_ACTUALIZA_CENTRO"])){


									 $centro_act = $centro_act+1;
									   "centro_act ".$centro_act;
									 $total[0] = $centro_act;

									 }
								    //centros actualizados y validados
								if (($item["admin_ano"] == $item["colab_ano"]) and ($item["CENTRO_ACTUALIZADO"]<$item["ADMIN_ACTUALIZA_CENTRO"])){
									 $muestra_admin3=1;
									
									 $centro_act2 = $centro_act2+1;
									  "centro_act2 ".$centro_act2;
									  $total[1] = $centro_act2;
									
									 }

							}
						}
				
					
			return $total;
	}
	
	
	 public function tablaResumen($centro){
	
		$query="select 
		
			(select count(*) from centro c 
						inner join ingreso i on i.ID_CENTRO=c.c_id_centro
						where ID_ESTADO_FICHA = 176 and c_nombre ='$centro'  )as 'Caso Nuevo',
			(select count(*) from centro c 
						inner join ingreso i on i.ID_CENTRO=c.c_id_centro
						where ID_ESTADO_FICHA = 177  and c_nombre ='$centro') as 'Datos Incompletos',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 178  and c_nombre ='$centro') as 'Digitación completa',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 179  and c_nombre ='$centro') as 'Caso Cerrado',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 180  and c_nombre ='$centro') as 'En revision',
			(select count(*) from centro c  
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 222  and c_nombre ='$centro') as 'Eliminado',
			(select count(*) from centro c 
			
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 368  and c_nombre ='$centro') as 'Caso Reabierto',
			count(*) as 'total'
		from centro c
		
		inner join ingreso i on i.ID_CENTRO=c.c_id_centro
		
		where c_nombre ='$centro'
		group by c_nombre ;" ;

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();	

		$this->conexionDao->Cerrar();
		return $row;	
	}
	
	
	public function alertaAdmin()
	{
		
		  $query ="
		
		select 
			
			(select count(*) from centro c 
						inner join ingreso i on i.ID_CENTRO=c.c_id_centro
						where ID_ESTADO_FICHA = 176   )as 'Caso Nuevo',
			(select count(*) from centro c 
						inner join ingreso i on i.ID_CENTRO=c.c_id_centro
						where ID_ESTADO_FICHA = 177  ) as 'Datos Incompletos',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 178  ) as 'Digitación completa',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 179  ) as 'Caso Cerrado',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 180  ) as 'En revision',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 222  ) as 'Eliminado',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 368  ) as 'Caso Reabierto',
			count(*) as 'total'
		from centro c
		inner join ingreso i on i.ID_CENTRO=c.c_id_centro
		
		" ; 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();		
		$this->conexionDao->Cerrar();
		return $row;	
	}
	
	public function alertaColab($centro){
		
		

			  $query= "
				select 
			c_nombre,
			(select count(*) from centro c 
						inner join ingreso i on i.ID_CENTRO=c.c_id_centro
						where ID_ESTADO_FICHA = 176 and c_nombre = '$centro'  )as 'Caso Nuevo',
			(select count(*) from centro c 
						inner join ingreso i on i.ID_CENTRO=c.c_id_centro
						where ID_ESTADO_FICHA = 177  and c_nombre  = '$centro') as 'Datos Incompletos',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 178  and c_nombre  = '$centro') as 'Digitación completa',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 179  and c_nombre  = '$centro') as 'Caso Cerrado',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 180  and c_nombre  = '$centro') as 'En revision',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 222  and c_nombre  = '$centro') as 'Eliminado',
			(select count(*) from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 368  and c_nombre  = '$centro') as 'Caso Reabierto',
			count(*) as 'total'
		from centro c
		inner join ingreso i on i.ID_CENTRO=c.c_id_centro
		where c_nombre = '$centro'
		group by c_nombre  
			"
			;
			
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();	
		//var_dump($row);	
		$this->conexionDao->Cerrar();
		return $row;	
		
	}
	
	
	
	
	public function contarIntervalo($estado,$var){
		
		$query="
		
		SELECT 
		count(	ID_NEOCOSUR),
		ID_ESTADO_FICHA  

	from centro c 
	inner join ingreso i on i.ID_CENTRO=c.c_id_centro
 WHERE 
 NOW() >  DATE_ADD(	FECHA_NACIMIENTO, INTERVAL 4 DAY) AND ID_ESTADO_FICHA =$estado
   $var 
		";
		
	}
	public function completaTotal(){
		
		 $query="
		
		SELECT 
		count(	ID_NEOCOSUR) as total,
		ID_ESTADO_FICHA  

	from ingreso 
 WHERE 
 ID_ESTADO_FICHA =178
  
		";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();	

		$this->conexionDao->Cerrar();
		$total = $row['total'];
		return $total;
		
		
	}
	public function completa($var){
		
		 $query="
		
		SELECT 
		count(	ID_NEOCOSUR) as total,
		ID_ESTADO_FICHA  

	from centro c 
	inner join ingreso i on i.ID_CENTRO=c.c_id_centro
 WHERE 
 ID_ESTADO_FICHA =178
   $var 
		";
		
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();	

		$this->conexionDao->Cerrar();
		return $row;
		
		
	}
	
	public function reAbierto(){
		$query="select count(*)as 'En revision' from centro c 
			inner join ingreso i on i.ID_CENTRO=c.c_id_centro
			where ID_ESTADO_FICHA = 180  ";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$row = $retorno->fetch_assoc();	
	
	$total = $row['En revision'];
		$this->conexionDao->Cerrar();
		return $total;	
		
	}
	
	
	function cambiarEstado($id,$var){
		$query;
		if($var==0){
			$query = "update centro set c_activo = ".$var." where c_id_centro = ".$id;			
		}
		else {
			$query = "update centro set c_activo = ".$var." where c_id_centro = ".$id;	
		}

		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
	
}