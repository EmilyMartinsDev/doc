  // Dados fictícios para os gráficos
  var dataChart1 = {
    labels: ['Categoria 1', 'Categoria 2', 'Categoria 3'],
    datasets: [{
        label: 'Dados do Gráfico 1',
        data: [30, 50, 20],
        backgroundColor: ['red', 'green', 'blue'],
    }]
};

var dataChart2 = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
    datasets: [{
        label: 'Dados do Gráfico 2',
        data: [50, 30, 60, 40, 70],
        borderColor: 'orange',
        fill: false,
    }]
};

var dataChart3 = {
    labels: ['Categoria A', 'Categoria B', 'Categoria C'],
    datasets: [{
        data: [25, 45, 30],
        backgroundColor: ['purple', 'yellow', 'pink'],
    }]
};

// Opções para os gráficos
var options = {
    responsive: true,
    maintainAspectRatio: false,
};

// Configuração dos gráficos
var ctx1 = document.getElementById('chart1').getContext('2d');
var chart1 = new Chart(ctx1, {
    type: 'bar',
    data: dataChart1,
    options: options,
});

var ctx2 = document.getElementById('chart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    type: 'line',
    data: dataChart2,
    options: options,
});

var ctx3 = document.getElementById('chart3').getContext('2d');
var chart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: dataChart3,
    options: options,
});