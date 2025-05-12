    @if (session()->has('add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Added Successfully",
                    type: "success"
                });
            }
        </script>
    @endif

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Edited Successfully",
                    type: "success"
                });
            }
        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Deleted Successfully",
                    type: "success"
                });
            }
        </script>
    @endif


    @if (session()->has('error'))
        <script>
            window.onload = function() {
                notif({
                    msg: " The service is required ",
                    type: "error"
                });
            }
        </script>
    @endif

    @if (session()->has('passwordInvalid'))
        <script>
            window.onload = function() {
                notif({
                    msg: " current Password invalid ",
                    type: "error"
                });
            }
        </script>
    @endif
