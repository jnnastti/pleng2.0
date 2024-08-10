<html>
    <head>

    <?php 
        include('../../assets/cmp/principal/head.php');
    ?>

    <title> PLENG | Dashboards </title>

    </head>

    <body>
        <?php 
            include('../../assets/cmp/principal/cabecalho.php');
        ?>

        <?php 
            include('../../assets/cmp/principal/menulateral.php');
        ?>

        <main class="container">
            <h1> Dashboards </h1>

            <canvas id="myChart" width="400" height="400"></canvas>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Grafico de porcentagem de todos os projetos de acordo com a conclusao de cada etapa -->

        <!-- Grafico de materiais consumidos no projeto selecionado -->
        <!-- Grafico de materiais a serem consumidos ate o final do projeto -->

        <!-- Etapa em andamento e etapas seguintes -->
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </body>
</html>