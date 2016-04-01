<html>
	<head>
		<title>
			CCDA file upload
		</title>
	</head>
	<body>
		<form method="POST" action="{{url('ccdafile')}}" accept-charset="UTF-8" id="import_form" enctype="multipart/form-data">
		select a file	<input type="file"  name ="patient_ccda">
			{{csrf_field()}}
           <input type="submit">
		</form>
	</body>
</html>

