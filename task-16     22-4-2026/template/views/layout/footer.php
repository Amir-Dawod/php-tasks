<script>
        let selectType = document.querySelector('#type');
        let book = document.querySelector('#bookFields');
        let babyCar = document.querySelector('#babyCarFields');
        selectType.addEventListener('change', function(e) {
            if (e.target.value == 'books') {
                babyCar.classList.add("hidden");
                book.classList.remove("hidden");
            } else {
                book.classList.add("hidden");
                babyCar.classList.remove("hidden");
            }
        })
    </script>

</body>

</html>