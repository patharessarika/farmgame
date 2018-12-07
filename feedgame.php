<?php 

error_reporting(0);
session_start();
	
if(!empty($_POST['Reload'])  ){	
	unset($_SESSION['logs']);
	if(empty($_SESSION['logs'])){
		
		$_SESSION['logs']['feedBConstant']=array('B1','B2','B3','B4');	
		$_SESSION['logs']['feedBlive'] =array('B1','B2','B3','B4');	
		$_SESSION['logs']['feedBDied'];
		$_SESSION['logs']['feedBDied1'];
		$_SESSION['logs']['feedCConstant']=array('C1','C2');	
		$_SESSION['logs']['feedClive'] =array('C1','C2');	
		$_SESSION['logs']['feedCDied'];
		$_SESSION['logs']['feedCDied1'];
		$_SESSION['logs']['feedFConstant']=array('F1');	
		$_SESSION['logs']['feedFlive'] =array('F1');	
		$_SESSION['logs']['feedFDied'];
		$_SESSION['logs']['feedFDied1'];
		$_SESSION['logs']['reloadB']='N';
		$_SESSION['logs']['reloadC']='N';
		$_SESSION['logs']['reloadF']='N';
		$_SESSION['logs']['submit']='';
		$_SESSION['logs']['reload']='disabled';
	}

}

if(!empty($_POST['Submit']) ){	
	
	function generateRandomKey(){		

		
		$my_array = array("F"=>"F","C"=>"C","B"=>"B");
		if(empty($_SESSION['logs']['feedBConstant'])){
			unset($my_array['B']);
			$_SESSION['logs']['submit']='disabled';
			$_SESSION['logs']['reload']='';
			$_SESSION['logs']['remark']='Sorry you lose the game !!!';
		}
		if(empty($_SESSION['logs']['feedCConstant'])){
			unset($my_array['C']);
			$_SESSION['logs']['submit']='disabled';
			$_SESSION['logs']['reload']='';
			$_SESSION['logs']['remark'] ='Sorry you lose the game !!!';
		}
		if(empty($_SESSION['logs']['feedFConstant'])){
			unset($my_array['F']);
			$_SESSION['logs']['submit']='disabled';
			$_SESSION['logs']['reload']='';
			$_SESSION['logs']['remark']='Sorry you lose the game !!!';
		}
		shuffle($my_array);

		 if($my_array[0] =='B'){
			 return array_shift($_SESSION['logs']['feedBlive']);
		 }if($my_array[0] =='C'){
			 return array_shift($_SESSION['logs']['feedClive']);
		 }else{
			 
			  return array_shift($_SESSION['logs']['feedFlive']);
		 }
	}
	
	if(count($_SESSION['logs']['Feed']) < '50'){
		$_SESSION['logs']['Feed'][]=generateRandomKey();
		
		if(count($_SESSION['logs']['Feed'])=='8' || count($_SESSION['logs']['Feed'])=='16' || count($_SESSION['logs']['Feed'])=='24' || count($_SESSION['logs']['Feed'])=='32' || count($_SESSION['logs']['Feed'])=='40' || count($_SESSION['logs']['Feed'])=='48'  ) {
			
					if($_SESSION['logs']['reloadB'] == 'N'){
						$tempB	= array();
						foreach($_SESSION['logs']['feedBConstant'] as $val){						
							if (in_array($val, $_SESSION['logs']['feedBlive'])){
								$_SESSION['logs']['feedBDied'][count($_SESSION['logs']['Feed'])][] =$val;
								$_SESSION['logs']['feedBDied1'][] =$val;
							}else{
								$tempB[] = $val;
							}
						}
						$_SESSION['logs']['feedBConstant'] = $tempB;
						$_SESSION['logs']['feedBlive']= $tempB;
					}
					$_SESSION['logs']['reloadB'] = 'N';
		}
		
		if(empty($_SESSION['logs']['feedBlive'])){
			$_SESSION['logs']['reloadB'] = 'Y';
			$_SESSION['logs']['feedBlive'] =$_SESSION['logs']['feedBConstant'];
		
		}
		
		if(count($_SESSION['logs']['Feed'])=='10' || count($_SESSION['logs']['Feed'])=='20' || count($_SESSION['logs']['Feed'])=='30' || count($_SESSION['logs']['Feed'])=='40' || count($_SESSION['logs']['Feed'])=='50'  ) {
			
					if($_SESSION['logs']['reloadC'] == 'N'){
						$tempB	= array();
						foreach($_SESSION['logs']['feedCConstant'] as $val){						
							if (in_array($val, $_SESSION['logs']['feedClive'])){
								$_SESSION['logs']['feedCDied'][count($_SESSION['logs']['Feed'])][] =$val;
								$_SESSION['logs']['feedCDied1'][] =$val;
							}else{
								$tempB[] = $val;
							}
						}
						$_SESSION['logs']['feedCConstant'] = $tempB;
						$_SESSION['logs']['feedClive']= $tempB;
					}
					$_SESSION['logs']['reloadC'] = 'N';
		}
		
		if(empty($_SESSION['logs']['feedClive'])){
			$_SESSION['logs']['reloadC'] = 'Y';
			$_SESSION['logs']['feedClive'] =$_SESSION['logs']['feedCConstant'];
		
		}
		
		if(count($_SESSION['logs']['Feed'])=='15' || count($_SESSION['logs']['Feed'])=='30' || count($_SESSION['logs']['Feed'])=='45'  ) {
			
					if($_SESSION['logs']['reloadF'] == 'N'){
						$tempB	= array();
						foreach($_SESSION['logs']['feedFConstant'] as $val){						
							if (in_array($val, $_SESSION['logs']['feedFlive'])){
								$_SESSION['logs']['feedFDied'][count($_SESSION['logs']['Feed'])][] =$val;
								$_SESSION['logs']['feedFDied1'][] =$val;
							}else{
								$tempB[] = $val;
							}
						}
						$_SESSION['logs']['feedFConstant'] = $tempB;
						$_SESSION['logs']['feedFlive']= $tempB;
					}
					$_SESSION['logs']['reloadF'] = 'N';
		}
		
		if(empty($_SESSION['logs']['feedFlive'])){
			$_SESSION['logs']['reloadF'] = 'Y';
			$_SESSION['logs']['feedFlive'] =$_SESSION['logs']['feedFConstant'];
		
		}
		
	}else{
		unset($_SESSION['logs']);
		$_SESSION['logs']['submit']='disabled';
		$_SESSION['logs']['reload']='';
	}

     

   
}

if(count($_SESSION['logs']['Feed']) == '50' ||  empty($_SESSION['logs'])){
	$Remark ='';
	if(count($_SESSION['logs']['Feed']) == '50'  ){
		if(empty($_SESSION['logs']['feedBConstant']) || empty($_SESSION['logs']['feedCConstant'])|| empty($_SESSION['logs']['feedFConstant'])){
			$_SESSION['logs']['remark'] ='Sorry you lose the game !!!';
		}else{
			$_SESSION['logs']['remark'] ='Congratulation you won the game !!!';
			
		}
	}
	
	$_SESSION['logs']['submit']='disabled';
	$_SESSION['logs']['reload']='';
	
	
}
//unset($_SESSION['logs']);
//echo "<pre>";
//print_r($_SESSION['logs']);
//print_r($_SESSION['logs']['Feed']);
//print_r(array_count_values($_SESSION['logs']));
//print_r(count($_SESSION['logs']));
?>
<div style="width:100%;text-align:center;" ><h2>Farm Feed</h2></div>
<table width="98%" border="1" style="margin:1% 1%;"  cellpadding="10" rules="rows"  >
	<form name="RequestSPForm" id="RequestSPForm" action="" method="POST" >
		<tr>
			<td>
				<input type="submit" name="Submit" id="Submit" value="Feed.." <?php echo $_SESSION['logs']['submit'];?> />
			</td>
			<td>
				<input type="submit" name="Reload" id="Reload" value="Reload New Game.."   <?php echo $_SESSION['logs']['reload'];?> />
			</td>
			
		</tr>
	</form>
</table>
<div style="width:100%;text-align:center;" ><h2>Response</h2><h4>No. Of Feeds : <?php echo (count($_SESSION['logs']['Feed']));?></h4></div>
<div style="width:100%;text-align:center;color:red" > <?php  echo $_SESSION['logs']['remark'];?></div>
<div style="width:100%;text-align:center;color:red" >
	Farmer Died: <?php  echo count($_SESSION['logs']['feedFDied1']); ?> &nbsp;&nbsp;&nbsp;
	Cow Died: <?php  echo count($_SESSION['logs']['feedCDied1']) ;?> &nbsp;&nbsp;&nbsp;
	Bunny Died: <?php  echo count($_SESSION['logs']['feedBDied1'])?> &nbsp;&nbsp;&nbsp;
</div>

<table width="98%" border="1" style="margin:1% 1%;font-size:11px;"  cellpadding="10" rules="rows">
	<tr style="background-color:grey;">
			<td>SR</td>	
			<td>F1</td>		
			<td>C1</td>
			<td>C2</td>
			<td>B1</td>
			<td>B2</td>
			<td>B3</td>		
			<td>B4</td>			
	</tr>
	<?php 
		if(!empty($_SESSION['logs']['Feed'])){

			foreach($_SESSION['logs']['Feed'] as $key=>$rVal){ 
			$curVal	=	$key+1;
			
				$F1 ='';		
				$C1 ='';			
				$C2 ='';				
				$B1 ='';				
				$B2 ='';			
				$B3 ='';				
				$B4 ='';
				
				
				if($rVal == 'F1'){
					$F1 ='Y';
				}if($rVal == 'C1'){
					$C1 ='Y';
				}if($rVal == 'C2'){
					$C2 ='Y';
				}if($rVal == 'B1'){
					$B1 ='Y';
				}if($rVal == 'B2'){
					$B2 ='Y';
				}if($rVal == 'B3'){
					$B3 ='Y';
				}if($rVal ==  'B4'){
					$B4 ='Y';
				}
				
				
				foreach($_SESSION['logs']['feedBDied'] as $Bkey=>$bVal ){
					if($Bkey ==$curVal){
						foreach($bVal as $bDiedVal){
							if($bDiedVal == 'B1'){
								$B1 ='<font color="red"><strong> X </strong></font>';
							}if($bDiedVal == 'B2'){
								$B2 ='<font color="red"><strong> X </strong></font>';
							}if($bDiedVal == 'B3'){
								$B3 ='<font color="red"><strong> X </strong></font>';
							}if($bDiedVal ==  'B4'){
								$B4 ='<font color="red"><strong> X </strong></font>';
							}
						}					
					}
				}
				
				foreach($_SESSION['logs']['feedCDied'] as $Ckey=>$cVal ){
					if($Ckey ==$curVal){
						foreach($cVal as $cDiedVal){
							if($cDiedVal == 'C1'){
								$C1 ='<font color="red"><strong> X </strong></font>';
							}if($cDiedVal == 'C2'){
								$C2 ='<font color="red"><strong> X </strong></font>';
							}
						}					
					}
				}
				
				foreach($_SESSION['logs']['feedFDied'] as $Fkey=>$fVal ){
					if($Fkey ==$curVal){
						foreach($fVal as $fDiedVal){
							if($fDiedVal == 'F1'){
								$F1 ='<font color="red"><strong> X </strong></font>';
							}
						}					
					}
				}
				
			?>
				
				<tr>
					<td><?php echo $curVal; ?></td>
					<td><?php echo $F1; ?></td>
					<td><?php echo $C1; ?></td>
					<td><?php echo $C2; ?> </td>
					<td><?php echo $B1; ?></td>
					<td><?php echo $B2; ?></td>
					<td><?php echo $B3; ?></td>
					<td><?php echo $B4; ?></td>				
					
				</tr>
	<?php 
			}
		}
	?>
</table>