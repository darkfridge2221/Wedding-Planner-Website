const venues = [
    { name: "Central Plaza", averageScore: 7.63 },
    { name: "Pacific Towers Hotel", averageScore: 5.1 },
    { name: "Sky Center Complex", averageScore: 7.02 },
    { name: "Sea View Tavern", averageScore: 6.5 },
    { name: "Ashby Castle", averageScore: 9.14 },
    { name: "Fawlty Towers", averageScore: 6.04 },
    { name: "Hilltop Mansion", averageScore: 4.77 },
    { name: "Haslegrave Hotel", averageScore: 8.79 },
    { name: "Forest Inn", averageScore: 7.47 },
    { name: "Southwestern Estate", averageScore: 8.51 }
];

function createVenueChart() {
    const ctx = document.getElementById('venueChart').getContext('2d');
    ctx.canvas.width = 400;
    ctx.canvas.height = 300;

    const venueNames = venues.map(venue => venue.name); //Extract venue names and average scores
    const averageScores = venues.map(venue => venue.averageScore);
    const venueChart = new Chart(ctx, { //Create chart
        type: 'bar',
        data: {
            labels: venueNames,
            datasets: [{
                label: 'Average Score',
                data: averageScores,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
}

document.addEventListener("DOMContentLoaded", function() { //Call the function to create the chart when DOM content is loaded
    createVenueChart();
});
