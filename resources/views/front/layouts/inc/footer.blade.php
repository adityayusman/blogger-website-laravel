<footer class="bg-dark mt-5">
    <div class="container section">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <a class="d-inline-block mb-4 pb-2" href="/">
                    <img loading="prelaod" decoding="async" class="img-fluid" src="{{ blogInfo()->blog_logo }}"
                        style="max-width: 100px" alt="{{ blogInfo()->blog_name }}">
                </a>
            </div>
        </div>
    </div>
    <div class="copyright bg-dark content">&copy;
        <script>
            document.write(new Date().getFullYear())
        </script> Designed &amp; Developed By <a href="/">{{ blogInfo()->blog_name }}</a>
    </div>
</footer>
