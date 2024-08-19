document.getElementById('sort').addEventListener('change', function() {
    var sortBy = this.value;
    var venuesContainer = document.querySelector('.container');
    var venues = Array.from(venuesContainer.querySelectorAll('.accommodation'));

    venues.sort(function(a, b) {
        var aValue, bValue;
        switch(sortBy) {
            case 'capacityAsc':
                aValue = parseInt(a.querySelector('p:nth-child(2)').innerText.split(' ')[1]);
                bValue = parseInt(b.querySelector('p:nth-child(2)').innerText.split(' ')[1]);
                return aValue - bValue;
            case 'capacityDesc':
                aValue = parseInt(a.querySelector('p:nth-child(2)').innerText.split(' ')[1]);
                bValue = parseInt(b.querySelector('p:nth-child(2)').innerText.split(' ')[1]);
                return bValue - aValue;
            case 'weekendPriceAsc':
                aValue = parseInt(a.querySelector('p:nth-child(3)').innerText.split('£')[1]);
                bValue = parseInt(b.querySelector('p:nth-child(3)').innerText.split('£')[1]);
                return aValue - bValue;
            case 'weekendPriceDesc':
                aValue = parseInt(a.querySelector('p:nth-child(3)').innerText.split('£')[1]);
                bValue = parseInt(b.querySelector('p:nth-child(3)').innerText.split('£')[1]);
                return bValue - aValue;
            case 'weekdayPriceAsc':
                aValue = parseInt(a.querySelector('p:nth-child(4)').innerText.split('£')[1]);
                bValue = parseInt(b.querySelector('p:nth-child(4)').innerText.split('£')[1]);
                return aValue - bValue;
            case 'weekdayPriceDesc':
                aValue = parseInt(a.querySelector('p:nth-child(4)').innerText.split('£')[1]);
                bValue = parseInt(b.querySelector('p:nth-child(4)').innerText.split('£')[1]);
                return bValue - aValue;
            case 'averageScoreAsc':
                aValue = parseFloat(a.querySelector('p:nth-child(6)').innerText.split(':')[1]);
                bValue = parseFloat(b.querySelector('p:nth-child(6)').innerText.split(':')[1]);
                return aValue - bValue;
            case 'averageScoreDesc':
                aValue = parseFloat(a.querySelector('p:nth-child(6)').innerText.split(':')[1]);
                bValue = parseFloat(b.querySelector('p:nth-child(6)').innerText.split(':')[1]);
                return bValue - aValue;
            case 'nameAsc':
                aValue = a.querySelector('h2').innerText.toLowerCase();
                bValue = b.querySelector('h2').innerText.toLowerCase();
                return aValue.localeCompare(bValue);
            case 'nameDesc':
                aValue = a.querySelector('h2').innerText.toLowerCase();
                bValue = b.querySelector('h2').innerText.toLowerCase();
                return bValue.localeCompare(aValue);
            default:
                return 0;
        }
    });

    venues.forEach(function(venue) {
        venuesContainer.appendChild(venue);
    });
});
