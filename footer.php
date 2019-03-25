
<!--footer nav bar-->
<?php
    $args = array(
        'theme_location' => 'footer',
    );
?>
<!--/footer nav bar-->


<!-- footer section -->
<div class="container-fluid footer">
        <ul class="list-inline">
        <li> Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name');?></li>
            <li>Powered by <a href="metricinternet.com">MetricInternet</a></li>

        </ul>

        <ul class="list-inline" style="color:white">
            <li><a href="../../../../news" title="News"> News</a></li>
            <li><a href="../../../../headlines" title="Headlines"> Headlines</a></li>
            <li><a href="../../../../opinion" title="Opinion"> Opinion</a></li>
            <li><a href="../../../../sports" title="Sports"> Sports</a></li>
            <li><a href="../../../../entertainment" title="Entertainment"> Entertainment</a></li>
            <li><a href="../../../../lifestyle" title="Lifestyle"> Lifestyle</a></li>
        </ul>
    </div>
    <!-- end of footer section -->
</body>

<script type='text/javascript'>
    // $(document).ready(function () {
    //     $('#logo').hide();
    // })
    // $(function () {
    //     //Keep track of last scroll
    //     var lastScroll = 0;
    //     $(window).scroll(function (event) {
    //         //Sets the current scroll position
    //         var st = $(this).scrollTop();
    //         //Determines up-or-down scrolling
    //         if (st > lastScroll) {
    //             //Replace this with your function call for downward-scrolling
    //             $('div#toplogo').hide(1000);
    //             $('#logo').show(1000);
    //             //             alert("DOWN");
    //         }
    //         else {
    //             //Replace this with your function call for upward-scrolling
    //             //             alert("UP");
    //             $('#logo').hide(function () {
    //                 $('div#toplogo').show(1000);
    //             });


    //         }
    //         //Updates scroll position
    //         lastScroll = st;
    //     });
    // });







    $(document).ready(function () {

        /**
         * This object controls the nav bar. Implement the add and remove
         * action over the elements of the nav bar that we want to change.
         *
         * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
         */
        var myNavBar = {

            flagAdd: true,

            elements: [],

            init: function (elements) {
                this.elements = elements;
            },

            add: function () {
                if (this.flagAdd) {
                    for (var i = 0; i < this.elements.length; i++) {
                        document.getElementById(this.elements[i]).className += " fixed-theme";
                    }
                    this.flagAdd = false;
                }
            },

            remove: function () {
                for (var i = 0; i < this.elements.length; i++) {
                    document.getElementById(this.elements[i]).className =
                        document.getElementById(this.elements[i]).className.replace(/(?:^|\s)fixed-theme(?!\S)/g, '');
                }
                this.flagAdd = true;
            }

        };

        /**
         * Init the object. Pass the object the array of elements
         * that we want to change when the scroll goes down
         */
        myNavBar.init([
            "header",
            "header-container",
            "brand"
        ]);

        /**
         * Function that manage the direction
         * of the scroll
         */
        function offSetManager() {

            var yOffset = 0;
            var currYOffSet = window.pageYOffset;

            if (yOffset < currYOffSet) {
                myNavBar.add();
            }
            else if (currYOffSet == yOffset) {
                myNavBar.remove();
            }

        }

        /**
         * bind to the document scroll detection
         */
        window.onscroll = function (e) {
            offSetManager();
        }

        /**
         * We have to do a first detectation of offset because the page
         * could be load with scroll down set.
         */
        offSetManager();
    });
</script>

</html>