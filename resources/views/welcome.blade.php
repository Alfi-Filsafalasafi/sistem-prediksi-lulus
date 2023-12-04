<!-- resources/views/train_and_predict.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Learning Results</title>
</head>
<body>
    <h1>Machine Learning Results</h1>

    <p>Accuracy: {{ $accuracy }}%</p>

    <p><strong>Predictions:</strong></p>
    <ul>
        @foreach ($predictions as $index => $prediction)
            <li>Sample {{ $index + 1 }}: {{ $prediction }}</li>
        @endforeach
    </ul>
</body>
</html>
