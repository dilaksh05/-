
    <!--End condten-->



    <!--footer-->

    <!--English-->

    <footer class="en" >
        <div class="container-fluid">
            <div class="roww">

                <div class="container-fluid text-center col-lg-12 col-md-12 p-2">
                    <ul class="list-unstyled text-white row  " style="font-size: 13px;">
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link"> Disclaimer</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">Other Webaites</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">For Contact</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">Sitemap</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">Archives</a></li>
                        <li class="col-6 col-md bg p-0"><a href="#" class="nav-link">Feedback</a></li>
                        <li class="col-12 col-md  bg p-0"><a href="" class="nav-link">Visitors : ABCD</a></li>
                    </ul>
                </div>

            </div>

            <div class="divider light">
                <hr>
            </div>

            <div class="row  ">
                <div class="col-lg-3 col-sm-12">
                    <div class="">
                        <ul class="list-inline text-white d-inline-block">

                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <p class="text-center text-white">Copyright @ 2024,
                        <a href="" class="text-center text-white text-decoration-none" target="_blank">Siddha
                            Medicine</a>
                    </p>
                </div>
                <div class="col-lg-3 text-right">
                    <p class="text-white">Developed By :
                        <a href=" " class="text-white text-decoration-none" target="_blank">Siddha Medicine</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!--Tamil-->

    <footer class="ta" >
        <div class="container-fluid">
            <div class="roww">

                <div class="container-fluid text-center col-lg-12 col-md-12 p-2">
                    <ul class="list-unstyled text-white row  " style="font-size: 13px;">
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">பொறுப்பு அறிவிக்கை</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">பிற இணையத் தளங்கள்</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">தொடர்பு கொள்ள</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">தள உள்ளடக்கம்</a></li>
                        <li class="col-6 col-md  bg p-0"><a href="" class="nav-link">தொகுப்பாற்றுப்படை</a></li>
                        <li class="col-6 col-md bg p-0"><a href="#" class="nav-link">கருத்து தெரிவிக்க</a></li>
                        <li class="col-12 col-md  bg p-0"><a href="" class="nav-link">பார்வையாளர் : ABCD</a></li>
                    </ul>
                </div>

            </div>

            <div class="divider light">
                <hr>
            </div>

            <div class="row  ">
                <div class="col-lg-3 col-sm-12">
                    <div class="">
                        <ul class="list-inline text-white d-inline-block">

                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="" target="_blank" class="nav-link"><i
                                        class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <p class="text-center text-white">பதிப்புரிமை @ 2024,
                        <a href="" class="text-center text-white text-decoration-none" target="_blank">சித்த
                            மருத்துவம்</a>
                    </p>
                </div>
                <div class="col-lg-3 text-right">
                    <p class="text-white">Developed By :
                        <a href=" " class="text-white text-decoration-none" target="_blank">சித்த மருத்துவம்</a>
                    </p>
                </div>
            </div>

          
        </div>
    </footer>
    <!--footer-->
    

    <!-- Include Bootstrap JS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

    <script>
        function switchLanguage(lang) {
            if (lang === 'en') {
                document.querySelectorAll('.en').forEach(el => {
                    el.style.display = 'block';
                });
                document.querySelectorAll('.ta').forEach(el => {
                    el.style.display = 'none';
                });
            } else if (lang === 'ta') {
                document.querySelectorAll('.ta').forEach(el => {
                    el.style.display = 'block';
                });
                document.querySelectorAll('.en').forEach(el => {
                    el.style.display = 'none';
                });
            }
        }
 
   </script>

<script>
    document.getElementById("search-form-bottom").addEventListener("submit", function (event) {
        event.preventDefault();

        var searchInput = document.getElementById("search-input-bottom").value.toLowerCase();
        var navItems = document.querySelectorAll(".side_bar ul li");

        navItems.forEach(function (item) {
            var itemName = item.textContent.toLowerCase();

            if (itemName.includes(searchInput)) {
                // Scroll to the found item and highlight it
                item.scrollIntoView({ behavior: "smooth", block: "center" });
                item.classList.add("highlight");

                // Add styles to simulate hover effect for searched item
                item.style.backgroundColor = 'rgb(245, 183, 105)';
                item.style.color = '#fff';

                // Highlight only the child item that contains the searched text
                item.querySelectorAll('li').forEach(function (childItem) {
                    var childItemName = childItem.textContent.toLowerCase();
                    if (childItemName.includes(searchInput)) {
                        childItem.classList.add("highlight");
                        childItem.style.backgroundColor = 'rgb(245, 183, 105)';
                        childItem.style.color = '#fff';
                    } else {
                        childItem.classList.remove("highlight");
                        childItem.style.backgroundColor = '';
                        childItem.style.color = '';
                    }
                });

                // Highlight all parent ul elements
                var parentUl = item.closest('ul');
                while (parentUl) {
                    parentUl.style.display = 'block';  // Display the parent ul
                    parentUl.previousElementSibling.style.backgroundColor = 'rgb(245, 183, 105)';
                    parentUl.previousElementSibling.style.color = '#fff';
                    parentUl = parentUl.closest('ul');
                }
            } else {
                item.classList.remove("highlight");

                // Remove simulated hover styles for searched item
                item.style.backgroundColor = 'rgb(252, 227, 160)';
                item.style.color = 'green';

                // Remove styles for all child items
                item.querySelectorAll('li').forEach(function (childItem) {
                    childItem.classList.remove("highlight");
                    childItem.style.backgroundColor = '';
                    childItem.style.color = '';
                });
            }
        });
    });
</script>



</body>

</html>