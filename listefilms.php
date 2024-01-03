<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Films</title>
    <link rel='stylesheet' href='styl.css'>
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
</head>
<body>

<header>
    <div id="navbar-container"></div>
</header>

<script src="Navbar.js" type="module"></script>
<script type="module">
    import Navbar from './Navbar.js';
    const navbarContainer = document.getElementById('navbar-container');
    ReactDOM.render(<Navbar />, navbarContainer);
</script>

</body>
</html>
