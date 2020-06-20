<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"
    integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>


<div class="container">
    <div class="section">
    <div class="columns is-multiline">
  <div class="column is-one-thirds-desktop">
        <h3 class="title is-4">Register Activity</h3>
        <canvas id="user-registered" width="auto" height="auto"></canvas>
  </div>
  <div class="column is-one-thirds-desktop">
        <h3 class="title is-4">User Activation</h3>
        <canvas id="user-activated" width="auto" height="auto"></canvas>
  </div>
  <div class="column is-one-thirds-desktop">
        <h3 class="title is-4">Post Activity</h3>
        <canvas id="post-activity" width="auto" height="auto"></canvas>
  </div>
  <div class="column is-half-desktop">
        <h3 class="title is-4">User By Categories</h3>
        <canvas id="user-by-cat" width="auto" height="auto"></canvas>
  </div>
  <div class="column is-half-desktop">
        <h3 class="title is-4">Post By Categories</h3>
        <canvas id="post-by-cat" width="auto" height="auto"></canvas>
  </div>
  
</div>
</div>

<script>
var ctx1 = document.getElementById('user-registered').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: [ <?= $mix_month_year; ?> ],
        datasets: [{
            label: '# of New User Registered',
            data: [ <?= $mix_count; ?> ],
            backgroundColor: [
                'rgba(255, 99, 132, 0)'
            ],
            borderColor: [
                '#e74c3c'
            ],
            borderWidth: 2,
            pointRadius:6,
            spanGaps:false,
            tension:0
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize:1,
                    beginAtZero: true
                }
            }],
            xAxes: [{
                type: 'time',
                time: {
                    unit: 'month'
                }
            }]
        }
    }
});
var ctx2 = document.getElementById('user-activated').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [ <?= $mix_active_date; ?> ],
        datasets: [{
            label: '# of User Activation',
            data: [ <?= $mix_active; ?> ],
            backgroundColor: [
                'rgba(155, 199, 132, 0)'
            ],
            borderColor: [
                '#2980b9'
            ],
            borderWidth: 2,
            pointRadius:6,
            spanGaps:false,
            tension:0
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize:1,
                    beginAtZero: true
                    
                }
            }],
            xAxes: [{
                type: 'time',
                time: {
                    unit: 'month'
                }
            }]
        }
    }
});
var ctx3 = document.getElementById('user-by-cat').getContext('2d');
var myChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
        datasets: [{
            data: [<?= $cat_user_list; ?>],
            backgroundColor: [
                '#2980b9',
                '#2ecc71',
                '#e74c3c',
                '#8e44ad'
            ],
            label: 'Dataset 1'
        }],
        labels: [<?= $cat_name_list; ?>]
    },
    options: {
        responsive: true
    }
});
var ctx4 = document.getElementById('post-activity').getContext('2d');
var myChart4 = new Chart(ctx4, {
    type: 'line',
    data: {
        labels: [ <?= $mix_post_date; ?> ],
        datasets: [{
            label: '# of Post Created',
            data: [ <?= $mix_post_count; ?> ],
            backgroundColor: [
                'rgba(155, 199, 132, 0)'
            ],
            borderColor: [
                '#2ecc71'
            ],
            borderWidth: 2,
            pointRadius:6,
            spanGaps:false,
            tension:0
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    stepSize:1,
                    beginAtZero: true
                }
            }],
            xAxes: [{
                type: 'time',
                time: {
                    unit: 'month'
                }
            }]
        }
    }
});
var ctx5 = document.getElementById('post-by-cat').getContext('2d');
var myChart5 = new Chart(ctx5, {
    type: 'pie',
    data: {
        datasets: [{
            data: [<?= $total_post_by_cat_list; ?>],
            backgroundColor: [
                '#2980b9',
                '#2ecc71',
                '#e74c3c',
                '#8e44ad'
            ],
            label: 'Dataset 1'
        }],
        labels: [<?= $cat_name_list; ?>]
    },
    options: {
        responsive: true
    }
});
</script>