<?php 
error_reporting(0);
class Form{ 
var $fields = array(); //satu isian data.
var $action; 
var $submit = ""; 
var $jumField=0; 
 
	function __construct($action, $submit){ 
		$this->action = $action; 
		$this->submit = $submit; 
	} 

	function displayForm(){ 
		echo"<form action='".$this->action."' method='post'>"; 
		echo"<table widht='100%'>"; 
		for($i=0;$i<$this->jumField;$i++) 
		//for($i=0;$i<count($this->fields);$i++) 
		{ 
			if($this->fields[$i]['type']=='dropDown'){
				echo"<tr><td align='right'>".$this->fields[$i]['label']."</td>";
				echo"<td><select name='".$this->fields[$i]['name']."'>";
				foreach ($this->fields[$i]['option'] as $opt) {
					if ($this->fields[$i]['value'] == $opt) {
						echo "<option selected='true'>".$opt."</option>";
					} else {
						echo "<option>".$opt."</option>";
					}
				}
				echo "</select></td></tr>"; 

			} else if($this->fields[$i]['type']=='Radio'){
				echo"<tr><td align='right'>".$this->fields[$i]['label']."</td>";
				echo"<td>";
				foreach ($this->fields[$i]['option'] as $opt) {
					if($this->fields[$i]['value'] == $opt){
						echo "<input type='radio' checked='true' name='".$this->fields[$i]['name']."' value='$opt' >";
						echo "<label>".$opt."</label>";
					} else {
						echo "<input type='radio' name='".$this->fields[$i]['name']."' value='$opt' required>";
						echo "<label>".$opt."</label>";
				}
				
				}
				echo "</td></tr>"; 



			} 
			// else if($this->fields[$i]['type'] == 'CheckBox'){
			// 				echo "<tr><td valign='top' align = 'left'>".$this->fields[$i]['label']."</td>";
			// 				echo "<td>";
			// 					foreach ($this->fields[$i]['option'] as $opt) {
			// 						echo "<input type='CheckBox' name='".($this->fields[$i]['name'].'[]')
			// 						."' value ='".$opt."'>". $opt."<br>";
			// 					}
			// 					echo "
			// 					</td>
			// 					</tr>";
            else if($this->fields[$i]['type']=='CheckBox'){
				echo"<tr><td valigen='top' align='left'>".$this->fields[$i]['label']."</td>";
				echo"<td>";
				foreach ($this->fields[$i]['option'] as $opt) {
					if(in_array($opt,$this->fields[$i]['value'])  > 0) {
					echo "<input type='CheckBox' checked='true' name='".($this->fields[$i]['name'].'[]')."' value='".$opt."'>". $opt."<br>";
				}else{
					echo "<input type='CheckBox' name='".($this->fields[$i]['name'].'[]')
						 ."' value ='".$opt."'>". $opt."<br>";
				}
				}
				echo "</td></tr>"; 






			}else if($this->fields[$i]['type']=='TextArea'){
				echo"<tr><td align='right'>".$this->fields[$i]['label']."</td>";
				echo"<td><textarea name='".$this->fields[$i]['name']."' required>".$this->fields[$i]['value']."</textarea></td></tr>"; 
			}
			
			else if($this->fields[$i]['type'] == 'password'){
				echo "<tr><td align='left'>".$this->fields[$i]['label']."</td>";			
				echo"<td><input type='password' placeholder='type here' name=".$this->fields[$i]['name'].">

					</td> 
					</tr>";
			}
			
			else if($this->fields[$i]['type'] == 'text'){
				echo"<tr><td align='right'>".$this->fields[$i]['label']."</td>";
				echo"<td><input type='text' name='".$this->fields[$i]['name']."' value='".$this->fields[$i]['value']."' required>
				</td></tr>"; 
			} 
			else if($this->fields[$i]['type'] == 'texttex'){
				echo"<tr><td align='right'>".$this->fields[$i]['label']."</td>";
				echo"<td><input disabled type='text' name='".$this->fields[$i]['name']."'readonly value='".$this->fields[$i]['value']."' required>
				</td></tr>"; 
			}  			
			
		} 
			echo"<tr><td></td><td><input type='submit' name='tombol'value='".$this->submit."'></td></tr>"; 
			echo"</table>"; 
		} 

	function addPassword($name, $label, $type = 'password'){
			$this->fields[$this->jumField]['name']=$name;
			$this->fields[$this->jumField]['label']=$label;
			$this->fields[$this->jumField]['type']=$type;
			//$this->fields[$this->jumField]['']=$value;
			$this->jumField++;
		}

	 function addDropdown($name,$label, $value ='', $option=array()){
		 $this->fields[$this->jumField]['name']=$name; 
		 $this->fields[$this->jumField]['label']=$label;
		 $this->fields[$this->jumField]['type']='dropDown';
		 $this->fields[$this->jumField]['option']=$option;
		 $this->fields[$this->jumField]['value']=$value;	
		 $this->jumField++; 
	 }

	 function addRadio($name,$label, $value ='',$option=array()){
		 $this->fields[$this->jumField]['name']=$name; 
		 $this->fields[$this->jumField]['label']=$label;
		 $this->fields[$this->jumField]['type']='Radio';
		 $this->fields[$this->jumField]['option']=$option;
		 $this->fields[$this->jumField]['value']=$value;
		 $this->jumField++; 
	 }

	 function addcheckbox($name,$label, $value ='',$option=array()){
		 $this->fields[$this->jumField]['name']=$name; 
		 $this->fields[$this->jumField]['label']=$label;
		 $this->fields[$this->jumField]['type']='CheckBox';
		 $this->fields[$this->jumField]['option']=$option;
		 $this->fields[$this->jumField]['value']=$value;
		 $this->jumField++; 
	 }

	 function addtextArea($name,$label,$value=''){
		 $this->fields[$this->jumField]['name']=$name; 
		 $this->fields[$this->jumField]['label']=$label;
		 $this->fields[$this->jumField]['type']='TextArea';
		 $this->fields[$this->jumField]['value']=$value;
		 $this->jumField++; 
	 }

	function addField($name,$label,$value = ''){ 
		 $this->fields[$this->jumField]['name']=$name; 
		 $this->fields[$this->jumField]['label']=$label; 
		 $this->fields[$this->jumField]['type']='text';
		 $this->fields[$this->jumField]['value']=$value;		
		$this->jumField++; 
	} 
	function addFielddis($name,$label,$value = ''){ 
		 $this->fields[$this->jumField]['name']=$name; 
		 $this->fields[$this->jumField]['label']=$label; 
		 $this->fields[$this->jumField]['type']='texttex';
		 $this->fields[$this->jumField]['value']=$value;		
		$this->jumField++; 
	} 

	
	function terimaForm(){
		for($i=0;$i<$this->jumField;$i++){
				$this->fields[$i]['value']=$_POST[$this->fields[$i]['name']];
			}
	}

	function cetakForm(){
		for($i=0;$i<$this->jumField;$i++){
			if ($this->fields[$i]['type']=='CheckBox') {
				$baru=implode(',', $this->fields[$i]['option']);
				echo $this->fields[$i]['label'];
				echo ":";
				echo $baru;
				echo "</br>";
			}else{
			echo $this->fields[$i]['label'].":".$this->fields[$i]['value']."</br>";
				}																																									
			}
	}

} //end
?> 