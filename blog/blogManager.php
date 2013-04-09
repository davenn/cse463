<?php
class blogManager
{

	function showFormula($id, $ClassName, $FTitle, $Formula){
		echo '<div id="fContainer"><p class="title"><em>'.
			$ClassName.':</em> '.$Ftitle.'</p><br>'.
			$Formula.'<br><br>
			<form action="formulaComment.php?id='.$id.'" method="post">
			<br><textarea name="Comment" cols="25" rows="1">Comment Here...</textarea>
			<br><input type="submit" value="SUBMIT" > </form>
			</div><br>';
	}

	function showFormulaComment($id,$fid,$UserName,$content,$date){
		echo '<div id="fCContainer"><p class="comment"><br>'.$date.'<br>'.$UserName.'<br>'.$content.'</p></div>';

	}


}
?>