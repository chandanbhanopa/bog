<?php
include "../includes/config.php";
include "../includes/functions.php";

if(!isset($_SESSION['user_data'])){
    header("Location: index.php"); 
    exit(); 
}
#job_application
$totalJobApplication = getTotal($conn, "job_application") ;

#contacts
$totalContacts = getTotal($conn, "contacts") ;

#email_subscription
$totalSubscription = getTotal($conn, "email_subscription") ;

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
                    <div class=" text-xl text-gray-800 flex space-x-4 items-center">
                        <a href="#">
                            <span class="md:hidden">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>

                        </span>
                        </a>
                        <span>Summery</span>
                    </div>
                </nav>
                <!-- /Nav -->

                <!-- Filters Section -->
                <section>
                    <!-- Invoice List Table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Total
                                            <a href="#">
                                                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Total Job Application
                                    </th>
                                    <td class="px-6 py-4">
                                        <?php echo $totalJobApplication;?>
                                    </td>
                                    
                                    <td class="px-6 py-4 text-right">
                                        <a href="job_application.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Total Contacts
                                    </th>
                                    <td class="px-6 py-4">
                                        <?php echo $totalContacts ?>

                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="contact.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Total Email Subscription
                                    </th>
                                    <td class="px-6 py-4">
                                        <?php echo $totalSubscription ?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="subscribers.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- /Invoice List Table -->
            </main>

    </div>

</body>

</html>