 <!-- Footer -->
 <footer class="footer">
     <div class="container">
         <div class="row">
             <div class="copyright">
                 <p class="mb-0">
                     &copy; 2024 Eraasoft. All rights reserved. |
                     Designed with <i class="fas fa-heart text-danger"></i> by Eraasoft Team
                 </p>
             </div>
         </div>
 </footer>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 <script>
     // Enable/disable submit button based on task input
     document.querySelector('#taskInput').addEventListener('input', function() {
         const submitBtn = document.querySelector('button[type="submit"]');
         const taskInput = this.value.trim();

         if (taskInput.length > 0) {
             submitBtn.disabled = false;
            //  submitBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Add Task';
         } else {
             submitBtn.disabled = true;
            //  submitBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Add Task';
         }
     });

 </script>
 </body>

 </html>