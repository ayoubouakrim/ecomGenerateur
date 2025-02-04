<!DOCTYPE html>
<html>
<head>
    <title>Éditeur de Template</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto p-4">
    <form action="{{ route('template.update', ['templateName' => $templateName]) }}" method="POST">
        @csrf
        <textarea id="editor" name="content" class="w-full h-64 p-2 border rounded">{{ file_get_contents($templatePath) }}</textarea>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Enregistrer les modifications</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-min-noconflict/ace.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/html");
</script>
</body>
</html>
