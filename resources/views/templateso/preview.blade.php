{{--
<!DOCTYPE html>
<html>
<head>
    <title>Prévisualisation du Template</title>
</head>
<body>
<iframe src="{{ $templatePath }}"  width="100%" height="600px"></iframe>
</body>
</html>
--}}
    <!DOCTYPE html>
<html>
<head>
    <title>Prévisualisation du Template</title>
</head>
<body>
<iframe src="{{ route('templateso.view', ['templateName' => $templateName]) }}" width="100%" height="600px"></iframe>
</body>
</html>

