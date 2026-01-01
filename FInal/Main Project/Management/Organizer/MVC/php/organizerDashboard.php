<!DOCTYPE html>
<html>
<head>
    <title>Organizer Dashboard</title>
    <link rel="stylesheet" href="../css/organizerDashboard.css">
</head>
<body>

    <div class="a">
        <h2>EventOrg</h2>
        <ul>
            <li class="active">Dashboard</li>
            <li>My Events</li>
            <li>Create Event</li>
            <li>Participants</li>
            <li>Tickets</li>
            <li>Payments</li>
            <li>Settings</li>
            <li class="logout">Logout</li>
        </ul>
    </div>

   
    <div class="main">
     
        <div class="b">
            <h1>Organizer Dashboard</h1>
            <div class="profile">
                <span>Welcome, Organizer</span>
            </div>
        </div>

     
        <div class="cards">
            <div class="card">
                <h3>Total Events</h3>
                <p>12</p>
            </div>
            <div class="card">
                <h3>Upcoming Events</h3>
                <p>5</p>
            </div>
            <div class="card">
                <h3>Participants</h3>
                <p>350</p>
            </div>
            <div class="card">
                <h3>Total Revenue</h3>
                <p>$4,500</p>
            </div>
        </div>

        <div class="table-container">
            <h2>Recent Events</h2>
            <table>
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tech Conference</td>
                        <td>12 Jan 2026</td>
                        <td>Dhaka</td>
                        <td class="active-status">Active</td>
                    </tr>
                    <tr>
                        <td>Music Fest</td>
                        <td>20 Feb 2026</td>
                        <td>Chittagong</td>
                        <td class="pending-status">Upcoming</td>
                    </tr>
                    <tr>
                        <td>Startup Meetup</td>
                        <td>02 Mar 2026</td>
                        <td>Online</td>
                        <td class="completed-status">Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
