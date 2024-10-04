<?php
include "../includes/config.php";
include "../includes/functions.php";
if(!isset($_SESSION['user_data'])){
    header("Location: index.php"); 
    exit(); 
}
$result = getAllContacts($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../includes/page_title.php";?>
</head>

<body class="font-montserrat ">
    <div class="flex min-h-screen 2xl:border-x-2 2xl:border-indigo-50 ">
        <?php include "sidebar.php";?>
            <!-- Sidebar -->
            <main class="bg-indigo-50/60 w-full py-10 px-3 sm:px-10">
                <!-- Nav -->
                <nav class="text-lg flex items-center justify-between content-center ">
                    <div class="text-xl text-gray-800 flex space-x-4 items-center">
                        <a href="#">
                            <span class="md:hidden">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>

                        </span>
                        </a>
                        <span>Total Contacts</span>
                    </div>
                </nav>
                <!-- /Nav -->

                <!-- Filters Section -->
                <section>
                    <!-- Invoice List Table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data="contactComponent()">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Full Name
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Email
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Mobile
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Subject</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Message
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Date
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) { ?>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $row['id'];?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?php echo $row['full_name'];?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['email'];?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['contact_number'];?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <?php echo $row['subject'];?>
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $row['message'];?>
                                    </th>
                                    <td class="px-6 py-4">
                                         <?php echo $row['created_at'];?>
                                    </td>
                                    <td class="px-6 py-4">
                                         <button type="button" id="<?php echo $row['id'];?>"  x-on:click="deleteContact" class="btn btn-danger bg-red-500 text-white w-28 h-10">Delete</button>
                                    </td>
                                    
                                </tr>
                                    <?php } 
                                    
                                    } else {
                                        echo "0 results";
                                    }
                                ?>
                                    
                                
                            </tbody>
                        </table>
                   </div>
                    <!-- /Invoice List Table -->
            </main>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script type="text/javascript">

        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function contactComponent() {
            return {
                deleteContact(event) {
                    if (confirm("Do you want to delete this contact?") == false) {
                        return false;    
                    }
                    const formData = new FormData();
                    formData.csrf_token =  csrfToken;
                    formData.contact_id = event.target.id;
                    formData.type = 'deleteContact';
                    fetch('/Api/index.php', {
                        method: 'POST',
                        headers :{
                            'Content-Type': 'application/json'
                        },
                        body:JSON.stringify(formData) 
                    })
                    .then((res)=>res.json())
                    .then(res=>{
                        if(res.status){
                            location.reload();
                        }
                    })
                    .catch((error)=>{

                    });
                }
            }
        }
    </script>
</body>
</html>