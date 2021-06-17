<pre lang="PHP"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Categories</title>
	<script type="text/javascript">
		function populateSubCategory(){
			window.location = 'inde.php';
		}
	</script>
</head>

<body>

	<form id="catform" action="inde.php" method="post">
		Category:	
		<select id="catDDL" name="catDDL"  önchange="populateSubCategory();">
			<option value="">Select One</option>

			<?php if(isset($categories)): ?><br mode="hold" /?>				
				<?php foreach($categories as $category): ?>
					<option value="<?php echo $category['vehicle']; ?>" >
						<?php echo $category['vehicle']; ?>		
					</option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
		<br />
		Sub Category:
		<select id="subCatDDL" name="subCatDDL">
			<option value="">Select sub category</option>
			<?php if(isset($subcategories)): ?>
				<?php foreach($subcategories as $subcategory): ?>
					<option value="<?php echo $subcategory['vehicle']; ?>"?>
						<?php echo $subcategory['vehicle']; ?>		
					</option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
	</form>
	
</body>
</html>