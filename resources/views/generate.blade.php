<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .col {
            flex: 1;
            padding: 0 15px;
            min-width: 300px;
        }
        
        .card {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }
        
        .input-group {
            margin-bottom: 15px;
        }
        
        .input-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        
        .input-value {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            background-color: #fff;
        }
        
        .color-preview {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
            border: 1px solid #ddd;
        }
        
        .component-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #eee;
        }
        
        .component-image {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 4px;
            margin-right: 15px;
        }
        
        .component-name {
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
            
            .col {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('layout.nav')


    <h1>Generate Your Template</h1>
    <p>Click the button below to create and download your HTML template.</p>
    
    <div class="container">
        <div class="row">
            <!-- First Column: User Input -->
            <div class="col">
                <div class="card">
                    <h2 class="card-title">Site Information</h2>
                    
                    <div class="input-group">
                        <label class="input-label">Site Name</label>
                        <div class="input-value" id="siteName">{{$userInput->siteName}}</div>
                    </div>
                    
                    <div class="input-group">
                        <label class="input-label">Description</label>
                        <div class="input-value" id="description">{{$userInput->description}}</div>
                    </div>
                    
                    <div class="input-group">
                        <label class="input-label">Logo</label>
                        <div class="input-value" id="logo"><img class="component-image" src="{{$userInput->logoUrl}}" alt=""></div>
                    </div>
                    
                    <div class="input-group">
                        <label class="input-label">Favicon</label>
                        <div class="input-value" id="faveIcon"><img class="component-image" src="{{$userInput->faveIcon}}" alt=""></div>
                    </div>
                    
                    <div class="input-group">
                        <label class="input-label">Primary Color</label>
                        <div class="input-value">
                            <span class="color-preview" style="background-color: {{$userInput->color1}};"></span>
                            <span id="color1">{{$userInput->color1}}</span>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label class="input-label">Secondary Color</label>
                        <div class="input-value">
                            <span class="color-preview" style="background-color: {{$userInput->color2}};"></span>
                            <span id="color2">{{$userInput->color2}}</span>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label class="input-label">Text Color</label>
                        <div class="input-value">
                            <span class="color-preview" style="background-color: {{$userInput->color3}};"></span>
                            <span id="color3">{{$userInput->color1}}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Second Column: Components -->
            <div class="col">
                <div class="card">
                    <h2 class="card-title">Components</h2>

                    @foreach ($components as $component)
                        <div class="component-item">
                            <div class="component-image"><img class="component-image" src="{{$component->img_path}}" alt=""></div>
                            <div class="component-name">{{ $component->component_name }}</div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    
    <a href="{{route('template.generate')}}" class="btn">Generate Template</a>
</body>
</html>
