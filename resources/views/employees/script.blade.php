<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Fetch all countries on load
        $.ajax({
            url: "https://countriesnow.space/api/v0.1/countries/positions",
            method: "GET",
            success: function (res) {
                if (res.data) {
                    res.data.forEach(c => {
                        $('#country-dropdown').append(`<option value="${c.name}">${c.name}</option>`);
                    });
                }
            }
        });

        // When country changes, load states
        $('#country-dropdown').on('change', function () {
            let country = $(this).val();

            $('#state-dropdown').empty().append('<option value="">Select State</option>');
            $('#city-dropdown').empty().append('<option value="">Select City</option>');

            $.ajax({
                url: "https://countriesnow.space/api/v0.1/countries/states",
                method: "POST",
                data: JSON.stringify({ country }),
                contentType: "application/json",
                success: function (res) {
                    if (res.data && res.data.states) {
                        res.data.states.forEach(s => {
                            $('#state-dropdown').append(`<option value="${s.name}">${s.name}</option>`);
                        });
                    }
                }
            });
        });

        // When state changes, load cities
        $('#state-dropdown').on('change', function () {
            let country = $('#country-dropdown').val();
            let state = $(this).val();

            $('#city-dropdown').empty().append('<option value="">Select City</option>');

            $.ajax({
                url: "https://countriesnow.space/api/v0.1/countries/state/cities",
                method: "POST",
                data: JSON.stringify({ country, state }),
                contentType: "application/json",
                success: function (res) {
                    if (res.data) {
                        res.data.forEach(city => {
                            $('#city-dropdown').append(`<option value="${city}">${city}</option>`);
                        });
                    }
                }
            });
        });
    });
</script>
