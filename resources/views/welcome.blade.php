<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>My Backend API Doc</h1>
    <h4>Get All Posts</h4>
    <ul>
        <li>Method : GET</li>
        <li>URL : "/api/posts"</li>
    </ul>
    <h4>Get Post By Id</h4>
    <ul>
        <li>Method : GET</li>
        <li>URL : "/api/posts/id/{id}"</li>
    </ul>

    <h4>Create Post</h4>
    <ul>
        <li>Method : POST</li>
        <li>URL : "/api/posts"</li>
        <li>Property : {"title", "content"}</li>
    </ul>
     <h4>Update Post</h4>
    <ul>
        <li>Method : PUT</li>
        <li>URL : "/api/posts"</li>
        <li>Property : {"id", "title", "content"}</li>
    </ul>
     <h4>Delete Post</h4>
    <ul>
        <li>Method : DELETE</li>
        <li>URL : "/api/posts/id/{id}"</li>
      
    </ul>
</body>
</html>