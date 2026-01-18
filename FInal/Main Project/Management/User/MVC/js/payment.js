// Show event details when selected
function showEventDetails() {
    const eventSelect = document.getElementById('event-select');
    const eventDetails = document.getElementById('event-details');
    const bookingsData = window.bookingsData || [];
    
    if (eventSelect.value) {
        const booking = bookingsData.find(b => b.event_id == eventSelect.value);
        if (booking) {
            document.getElementById('detail-name').textContent = booking.event_name;
            document.getElementById('detail-date').textContent = booking.event_date;
            document.getElementById('detail-location').textContent = booking.event_location;
            document.getElementById('detail-description').textContent = booking.event_description;
            eventDetails.style.display = 'block';
        }
    } else {
        eventDetails.style.display = 'none';
    }
}

// Filter events by search
function filterEvents() {
    const searchTerm = document.getElementById('search-event').value.toLowerCase();
    const selectElement = document.getElementById('event-select');
    const options = selectElement.querySelectorAll('option');
    
    options.forEach(option => {
        if (option.value === '') {
            option.style.display = 'block';
        } else {
            const name = option.getAttribute('data-name').toLowerCase();
            const location = option.getAttribute('data-location').toLowerCase();
            
            if (name.includes(searchTerm) || location.includes(searchTerm)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }
    });
}

// Initialize event listeners when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-event');
    if (searchInput) {
        searchInput.addEventListener('keyup', filterEvents);
    }
});
