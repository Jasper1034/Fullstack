(No subject)

Ali Mohamed, Mahamed-Amin
​
Alif, Md​
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ajax Demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Game Search</h1>
    <form class="row g-3">
        <div class="col-auto">
            <input type="text" class="form-control" id="searchBox" placeholder="Type game name...">
        </div>
    </form>

    <!-- Loading Spinner -->
    <div id="loading" class="mt-3" style="display:none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <span class="ms-2">Please wait...</span>
    </div>

    <!-- Results Area -->
    <div id="results" class="mt-3"></div>
</div>

<script>
document.getElementById("searchBox").addEventListener("keyup", doSearch);

function doSearch() {
    let keywords = document.getElementById("searchBox").value.trim();

    // Only search if 2 or more characters entered
    if (keywords.length < 2) {
        document.getElementById("results").innerHTML = '';
        return;
    }

    // Show spinner
    document.getElementById("loading").style.display = 'block';

    fetch('https://mi-linux.wlv.ac.uk/~2407655/fullstackyr2/ajax.php?search=' + encodeURIComponent(keywords))
    .then(response => response.json())
    .then(response => {
        // Hide spinner
        document.getElementById("loading").style.display = 'none';
        const resultsDiv = document.getElementById("results");
        resultsDiv.innerHTML = '';

        if (response.length === 0) {
            resultsDiv.innerHTML = '<p class="text-muted">No games found.</p>';
            return;
        }

        // Build HTML table
        let table = `
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Game Name</th>
                        <th>Genre</th>
                        <th>Platform</th>
                    </tr>
                </thead>
                <tbody>
        `;

        response.forEach(game => {
            table += `
                <tr>
                    <td>${game.game_name}</td>
                    <td>${game.genre || 'N/A'}</td>
                    <td>${game.platform || 'N/A'}</td>
                </tr>
            `;
        });

        table += '</tbody></table>';
        resultsDiv.innerHTML = table;
    })
    .catch(error => {
        document.getElementById("loading").style.display = 'none';
        document.getElementById("results").innerHTML = '<p class="text-danger">Error fetching data.</p>';
        console.error(error);
    });
}
</script>
</body>
</html>