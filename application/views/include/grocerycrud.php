<?php foreach($crud['js_files'] as $file ): ?>
    <script src="<?php echo $file; ?>"> </script>
<?php endforeach; ?>

<?php foreach($crud['css_files'] as $file ): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>