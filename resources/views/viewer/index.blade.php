<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDF Viewer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header x-data="searchs" id="header" class=" px-4 lg:px-0 shadow-3xl fixed top-0 left-0 z-50 right-0 bg-white">
    <div class="container mx-auto flex items-center  justify-between md:py-4">
        <div class="logo flex py-4 gap-4 items-center justify-between md:justify-start  ">
            <svg @click="open_modal = !open_modal" id="menu_icon" class="w-12 h-12 hover:cursor-pointer" viewBox="0 0 48 48"
                 fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 14H38" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                <path d="M10 24H38" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                <path d="M10 34H38" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
            </svg>
            <a href="" class="hidden md:block hover:cursor-pointer">
                <img src="{{ asset('images/libshare-png-2.png') }}" alt="" class="w-[104px] object-cover">
            </a>

        </div>
        <a href="" class=" md:hidden hover:cursor-pointer grow ">
            <img src="{{ asset('images/libshare-png-2.png') }}" alt="" class="w-[104px] object-cover">
        </a>
        <div
            class="hidden lg:flex items-center container_search mx-4 lg:ml-10 relative border border-slate-300 rounded-4xl    hover:border-primary grow">
            <div class=" grow flex items-center justify-between md:mr-3">
                <input x-model="search" id="search_global"
                       class="search rounded-4xl  md:pl-6 w-full  px-4 py-2 md:py-4  outline-none placeholder:text-base   md:placeholder:text-lg placeholder:font-medium placeholder:text-search  peer "
                       type="text" placeholder="Search for documents, universities and other resources">
                <ul id="relative_search_result"
                    class="hidden absolute border shadow border-slate-300 rounded bg-white  w-full peer-focus:block top-[calc(100%+10px)] md:top-[calc(100%+20px)] max-h-[75vh] overflow-y-auto  scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-gray-200 hover:scrollbar-thumb-gray-700">
                    <li class="p-2.5 text-primary" x-show="!noResults"># Relative search result</li>
                    <template x-for="item in filterSearchs">
                        <li class="hover:bg-slate-100 px-2.5">
                            <a href="" class="text-base text-text-default-darker inline-block p-2 font-medium" x-text="item.name">
                            </a>
                        </li>
                    </template>
                    <li class="text-red-400 p-2.5" x-show="noResults"> No result!</li>

                </ul>
            </div>

            <a href="" class="mr-4 md:mr-6">
                <svg class="w-5 md:w-8" width="41" height="38" viewBox="0 0 41 38" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M2.68945 17C2.68945 8.75799 9.69437 2 18.4319 2C27.1695 2 34.1744 8.75799 34.1744 17C34.1744 21.0541 32.4796 24.7491 29.7174 27.4574C29.6516 27.4996 29.5898 27.5502 29.5334 27.6092C29.4986 27.6455 29.4671 27.6839 29.4389 27.7238C26.6071 30.3655 22.729 32 18.4319 32C9.69437 32 2.68945 25.242 2.68945 17ZM30.2515 29.6786C27.1073 32.3693 22.9601 34 18.4319 34C8.67626 34 0.689453 26.4311 0.689453 17C0.689453 7.5689 8.67626 0 18.4319 0C28.1876 0 36.1744 7.5689 36.1744 17C36.1744 21.3456 34.4787 25.2958 31.6957 28.2923L40.051 36.2771C40.4502 36.6587 40.4646 37.2917 40.083 37.6909C39.7015 38.0902 39.0685 38.1046 38.6692 37.723L30.2515 29.6786Z"
                          fill="#00A888" />
                </svg>
            </a>

        </div>

        <div class=" gap-4 items-center flex  ">
            <div
                class="hidden md:inline-flex border border-solid border-slate-300   rounded-3xl  gap-2 py-2 px-4 items-center hover:bg-primary hover:bg-opacity-50 group hover:cursor-pointer">
                <svg class="stroke-text-default-darker group-hover:stroke-white" width="24" height="25" viewBox="0 0 24 25"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12.5" r="8" stroke="" stroke-width="2" />
                    <ellipse cx="12" cy="12.5" rx="3" ry="8" stroke="" stroke-width="2" />
                    <path d="M4 12.5H20" stroke="" stroke-width="2" stroke-linecap="round" />
                </svg>

                <span class="language text-base leading-7	 text-text-default-darker group-hover:text-white">English</span>
            </div>
            <div
                class="bg-primary hidden  md:inline-flex py-2 px-4 rounded-3xl gap-2 items-center hover:bg-primary-lighter hover:cursor-pointer">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M20.001 10.4794C19.9896 4.95657 15.5032 0.488644 9.98038 0.500017C4.45754 0.51139 -0.0103799 4.99775 0.000993226 10.5206C0.0116713 15.7059 3.96712 19.9613 9.02147 20.4527L9.00183 10.9163L5.71572 14.2159L4.2986 12.8046L9.28829 7.79435L9.99394 7.08579L10.7025 7.79144L15.7128 12.7811L14.3015 14.1983L11.0018 10.9121L11.0215 20.4485C16.0737 19.9364 20.0116 15.6647 20.001 10.4794Z"
                          fill="white" />
                </svg>
                <span class="text-lg text-white">Upload</span>
            </div>
            <div x-data="{open:false}" class="relative ">
                <div class="" @click="open = ! open">
                    <svg id="notification_icon" class="w-6 h-6 group hover:cursor-pointer" viewBox="0 0 24 24"
                         xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24">
              <path
                  d="M13.7 20h-3.5c-.7 0-1.3.8-.9 1.5.6.9 1.6 1.5 2.7 1.5s2.1-.6 2.6-1.5c.4-.7-.1-1.5-.9-1.5zM21.8 16.7l-.4-.5C19.8 14.1 19 11.6 19 9v-.7c0-3.6-2.6-6.8-6.2-7.2C8.6.6 5 3.9 5 8v1c0 2.6-.8 5.1-2.4 7.2l-.4.5c-.2.2-.3.6-.2.8.3.9 1.1 1.5 2 1.5h16c.9 0 1.7-.6 1.9-1.5.1-.3 0-.6-.1-.8z"
                  class="hover:fill-primary" :class="open ? 'fill-primary' :'fill-text-default-darker'"></path>
            </svg>
                </div>
                <div x-cloak x-show="open" id="notifications" @click.outside="open=false"
                     class=" absolute border border-solid border-slate-300  w-[80vw] -translate-x-[65%] md:translate-x-0 left-0 md:left-auto md:w-auto  md:-right-6    md:min-w-[550px] bg-white top-[calc(100%+25px)]	rounded peer  ">
            <span
                class="block absolute w-6 h-6  rotate-45 right-0 z-10 bg-white border-t border-l border-solid border-slate-300 -translate-y-[calc(100%-11px)] -translate-x-[calc(334%)] md:-translate-x-[calc(100%-2px)]"></span>
                    <h2 class="font-bold text-text-default-darker text-lg mb-4  p-4 md:p-6">Last Notifications</h2>
                    <ul
                        class="overflow-y-auto  h-[calc(100vh-200px)] md:h-auto md:max-h-[75vh] scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-gray-200 hover:scrollbar-thumb-gray-700">
                        <li
                            class="flex gap-2 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-primary-lighter hover:bg-opacity-50 hover:cursor-pointer">
                            <svg class="hidden md:block" width="64" height="64" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="14" cy="14" r="14" fill="#FFAA00" />
                                <path d="M7 16L10.2331 18.4248C10.6618 18.7463 11.2677 18.6728 11.607 18.2581L20 8" stroke="#FFAA00"
                                      stroke-width="2" stroke-linecap="round" />
                            </svg>

                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater handbook 19th
                      edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-primary-lighter hover:bg-opacity-50 hover:cursor-pointer">
                            <svg class="hidden md:block" width="64" height="64" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="14" cy="14" r="14" fill="#FFAA00" />
                                <path d="M7 16L10.2331 18.4248C10.6618 18.7463 11.2677 18.6728 11.607 18.2581L20 8" stroke="#FFAA00"
                                      stroke-width="2" stroke-linecap="round" />
                            </svg>

                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document
                                    <span class="text-primary font-bold">Human Resources Management In Banken: Strategien, Instrumente
                      Und Grundsatzfragen (german Edition)</span>
                                    a accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-primary-lighter hover:bg-opacity-50 hover:cursor-pointer">
                            <svg class="hidden md:block" width="64" height="64" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="14" cy="14" r="14" fill="#E13D34" />
                                <path d="M20 8L8 20" stroke="#E13D34" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M8 8L20 20" stroke="#E13D34" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>


                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="font-bold text-text-default-darker"> HOW TO WRITE IELTS REPORTS
                      Ielts-Writing-task1 </span>
                                    unaccepted, reason: Your document was already on the website.
                                </p>
                            </div>
                        </li>

                        <li
                            class="flex gap-2 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-primary-lighter hover:bg-opacity-50 hover:cursor-pointer ">
                            <svg class="hidden md:block" width="64" height="64" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="14" cy="14" r="14" fill="#FFAA00" />
                                <path d="M7 16L10.2331 18.4248C10.6618 18.7463 11.2677 18.6728 11.607 18.2581L20 8" stroke="#FFAA00"
                                      stroke-width="2" stroke-linecap="round" />
                            </svg>

                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater handbook 19th
                      edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-primary-lighter hover:bg-opacity-50 hover:cursor-pointer">
                            <svg class="hidden md:block" width="64" height="64" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="14" cy="14" r="14" fill="#FFAA00" />
                                <path d="M7 16L10.2331 18.4248C10.6618 18.7463 11.2677 18.6728 11.607 18.2581L20 8" stroke="#FFAA00"
                                      stroke-width="2" stroke-linecap="round" />
                            </svg>

                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document
                                    <span class="text-primary font-bold">Human Resources Management In Banken: Strategien, Instrumente
                      Und Grundsatzfragen (german Edition)</span>
                                    a accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-primary-lighter hover:bg-opacity-50 hover:cursor-pointer">
                            <svg class="hidden md:block" width="64" height="64" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="14" cy="14" r="14" fill="#E13D34" />
                                <path d="M20 8L8 20" stroke="#E13D34" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M8 8L20 20" stroke="#E13D34" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>


                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="font-bold text-text-default-darker"> HOW TO WRITE IELTS REPORTS
                      Ielts-Writing-task1 </span>
                                    unaccepted, reason: Your document was already on the website.
                                </p>
                            </div>
                        </li>


                        <li
                            class="text-base md:text-lg text-primary font-semibold text-center p-6 hover:cursor-pointer hover:underline hover:decoration-2">
                            See more notifications
                        </li>
                    </ul>
                </div>

            </div>
            <div x-data="{open:false}" class="relative">
                <div @click="open = !open " id="profile_icon" class="flex items-center hover:cursor-pointer">
            <span
                class="inline-flex  w-12 h-12 bg-[#5D789B] hover:bg-opacity-50 rounded-full  text-white text-2xl font-medium items-center justify-center">N</span>
                    <svg class="w-8 h-8" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                         enable-background="new 0 0 64 64">
              <path d="m-218.7-308.6 2-2 11.7 11.8 11.7-11.8 2 2-13.7 13.7-13.7-13.7" transform="translate(237 335)"
                    fill="#33363f" class="fill-134563"></path>
            </svg>
                </div>
                <div x-cloak x-show="open" @click.outside="open = false" id="profiles"
                     class=" absolute top-[calc(100%+16px)] right-0 w-80 border border-solid border-slate-300 rounded text-text-default  bg-white">
            <span
                class=" md:block absolute w-6 h-6  rotate-45 right-0 z-10 bg-white border-t border-l border-solid border-slate-300 -translate-y-[calc(100%-12px)] -translate-x-[calc(100%+16px)]"></span>

                    <div class="  flex flex-col  rounded py-6">
                        <a href=""
                           class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-primary-lighter ">
                            <span class="font-thin text-base group-hover:text-white">Home</span>
                            <svg class=" fill-[#00A888] group-hover:fill-white w-4 h-5 md:w-3.5 md:h-4" viewBox="0 0 14 15"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.65893 1.19478L1.25893 4.57194C0.716448 4.98832 0.398438 5.63329 0.398438 6.31714V13.7333C0.398438 14.3408 0.890924 14.8333 1.49844 14.8333H3.69844C4.30595 14.8333 4.79844 14.3408 4.79844 13.7333V10.8C4.79844 10.1925 5.29092 9.7 5.89844 9.7H8.09844C8.70595 9.7 9.19844 10.1925 9.19844 10.8V13.7333C9.19844 14.3408 9.69092 14.8333 10.2984 14.8333H12.4984C13.106 14.8333 13.5984 14.3408 13.5984 13.7333V6.31714C13.5984 5.63329 13.2804 4.98832 12.7379 4.57194L8.33794 1.19478C7.54788 0.588384 6.44899 0.588384 5.65893 1.19478Z" />
                            </svg>
                        </a>
                        <a href=""
                           class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-primary-lighter ">
                            <span class="font-thin text-base group-hover:text-white">Profile</span>
                            <svg class="fill-[#00A888] group-hover:fill-white w-5 h-6 md:w-4 " viewBox="0 0 16 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="7.9987" cy="5.83334" rx="2.66667" ry="2.66667" />
                                <path
                                    d="M3.50526 12.2797C3.92987 10.2626 5.93745 9.16667 7.9987 9.16667C10.0599 9.16667 12.0675 10.2626 12.4921 12.2797C12.5394 12.5043 12.5792 12.7344 12.6087 12.9675C12.6688 13.4432 12.2766 13.8333 11.7971 13.8333H4.20028C3.72076 13.8333 3.32862 13.4432 3.38874 12.9675C3.4182 12.7344 3.45796 12.5043 3.50526 12.2797Z" />
                            </svg>

                        </a>
                        <a href=""
                           class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-primary-lighter">
                            <span class="font-thin text-base group-hover:text-white">Settings</span>
                            <svg class="fill-[#00A888] group-hover:fill-white w-5 h-6 md:w-4" viewBox="0 0 16 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.42148 2.72803L9.42279 2.74095L9.42515 2.76411C9.51047 3.54961 10.4302 3.93055 11.0459 3.43546L11.0639 3.42075L11.074 3.41255C11.47 3.09233 12.0435 3.12094 12.4057 3.47897L12.4149 3.48813L13.0105 4.08377L13.0197 4.09297C13.3777 4.45519 13.4063 5.02862 13.0861 5.42467L13.0779 5.43473L13.0632 5.45278C12.5681 6.06854 12.949 6.98821 13.7345 7.07354L13.7577 7.0759L13.7707 7.07721C14.2771 7.13084 14.6624 7.55653 14.6653 8.06582L14.6654 8.07882V8.92125L14.6653 8.93411C14.6624 9.44344 14.2771 9.86919 13.7706 9.92279L13.7578 9.92409L13.7349 9.92641C12.9493 10.0116 12.5683 10.9315 13.0635 11.5473L13.078 11.5651L13.0861 11.575C13.4064 11.971 13.3778 12.5446 13.0197 12.9068L13.0106 12.9158L12.4149 13.5116L12.4057 13.5207C12.0435 13.8788 11.4701 13.9074 11.074 13.5871L11.064 13.5789L11.0459 13.5642C10.4302 13.0691 9.5105 13.4501 9.42517 14.2356L9.42281 14.2589L9.42148 14.272C9.36782 14.7784 8.94217 15.1636 8.43294 15.1666L8.41978 15.1667H7.57752L7.56452 15.1666C7.05524 15.1637 6.62954 14.7784 6.57591 14.272L6.5746 14.259L6.57224 14.2358C6.48691 13.4503 5.56725 13.0694 4.95149 13.5645L4.93341 13.5792L4.92333 13.5875C4.52729 13.9077 3.95387 13.8791 3.59165 13.521L3.58244 13.5119L2.98681 12.9162L2.97763 12.907C2.61961 12.5448 2.59101 11.9714 2.91121 11.5753L2.91943 11.5653L2.93416 11.5472C3.42925 10.9314 3.0483 10.0118 2.26281 9.92644L2.23965 9.92409L2.22674 9.92278C1.72027 9.86916 1.33501 9.44345 1.33205 8.93416L1.33203 8.92118V8.07889L1.33205 8.06576C1.33505 7.55652 1.72026 7.13087 2.22667 7.07721L2.23973 7.07589L2.26316 7.07351C3.04856 6.98812 3.42944 6.06857 2.93447 5.45283L2.91955 5.43454L2.91118 5.42429C2.59106 5.02827 2.61966 4.45494 2.9776 4.09274L2.98692 4.08339L3.58247 3.48784L3.59168 3.47865C3.9539 3.12064 4.52732 3.09204 4.92336 3.41223L4.93349 3.4205L4.95143 3.43513C5.56721 3.93035 6.48703 3.54934 6.57229 2.76375L6.57461 2.74087L6.5759 2.7281C6.6295 2.22158 7.05526 1.83627 7.5646 1.83334L7.57743 1.83333H8.41988L8.43286 1.83335C8.94215 1.83631 9.36786 2.22157 9.42148 2.72803ZM7.9987 11.1667C9.47146 11.1667 10.6654 9.97275 10.6654 8.5C10.6654 7.02724 9.47146 5.83333 7.9987 5.83333C6.52594 5.83333 5.33203 7.02724 5.33203 8.5C5.33203 9.97275 6.52594 11.1667 7.9987 11.1667Z" />
                            </svg>

                        </a>

                        <a href=""
                           class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-primary-lighter">
                            <span class="font-thin text-base group-hover:text-white">Uploads</span>
                            <svg class="fill-[#00A888] group-hover:fill-white w-4 h-5 md:w-3.5 md:h-4" viewBox="0 0 14 15"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.6654 7.5C13.6654 3.8181 10.6806 0.833329 6.9987 0.833329C3.3168 0.833329 0.332031 3.8181 0.332031 7.5C0.332031 10.842 2.79119 13.6097 5.9987 14.0922V8.58088L4.37247 10.2071L2.95826 8.79289L6.29159 5.45956L6.9987 4.75245L7.7058 5.45956L11.0391 8.79289L9.62492 10.2071L7.9987 8.58088V14.0922C11.2062 13.6097 13.6654 10.842 13.6654 7.5Z" />
                            </svg>

                        </a>
                        <a href=""
                           class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-primary-lighter">
                            <span class="font-thin text-base group-hover:text-white">Sign out</span>
                            <svg class="fill-[#00A888] group-hover:fill-white w-4 h-5 md:w-2.5 md:h-4" viewBox="0 0 10 15"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.332031 6.49999H3.58474L2.21783 4.79136L3.77957 3.54197L6.44623 6.8753L6.94599 7.49999L6.44623 8.12469L3.77957 11.458L2.21783 10.2086L3.58474 8.49999H0.332031C0.332035 11.1129 0.333686 12.4213 1.03691 13.2568C1.24815 13.5077 1.4991 13.7223 1.77979 13.892C2.71645 14.4584 4.01315 14.2546 6.60655 13.8471C7.90772 13.6426 8.5583 13.5404 8.99797 13.1475C9.13149 13.0282 9.24839 12.8915 9.34552 12.7411C9.66536 12.2457 9.66536 11.5872 9.66536 10.27V4.7294C9.66536 3.41226 9.66536 2.7537 9.34552 2.25838C9.24839 2.10795 9.13149 1.97125 8.99797 1.85194C8.5583 1.45908 7.90772 1.35685 6.60655 1.15238C4.01315 0.744846 2.71645 0.541078 1.77979 1.10742C1.4991 1.27714 1.24815 1.49174 1.03691 1.74268C0.333636 2.57816 0.332035 3.8867 0.332031 6.49999Z" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

<!-- Title -->
<div class="bg-white mt-32">
    <div class="container mx-auto">
        <!-- Breadcrumbs -->
        <nav class="flex mx-4 lg:mx-0" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                        </svg>
                        Home
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">Criminal Law

              </span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Title -->
        <div class="mt-9">
            <div class="flex flex-col h-full mx-4 lg:mx-0">
                <div class="basis-2/3 mb-4 flex md:flex-row flex-col">
                    <div class="text-2xl font-bold md:basis-2/3 my-auto leading-loose">
                        Solutions Fundamentals of Futures and Options Markets 7e by Hull
                        Chapter 07
                    </div>
                    <div class="md:basis-1/3 flex md:justify-end mt-3 md:mt-0">
                        <button type="button"
                                class="lg:w-1/4 h-12 bg-opacity-20 text-base text-primary bg-search hover:text-white hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-2lg px-5 py-2.5 text-center flex justify-center items-center mr-2">
                            <i class="fa-solid fa-thumbs-up mr-2"></i>
                            0
                            <p class="lg:block hidden ml-1">Helpful</p>
                        </button>
                        <button type="button"
                                class="lg:w-1/3 h-12 bg-opacity-20 text-base text-primary bg-search hover:text-white hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-2lg px-5 py-2.5 text-center flex justify-center items-center mr-2">
                            <i class="fa-solid fa-thumbs-down mr-2"></i>
                            0
                            <p class="lg:block hidden ml-1">Unhelpful</p>
                        </button>
                        <button type="button" id="dropdownShare" data-dropdown-toggle="dropdown"
                                class="h-12 bg-opacity-20 text-base text-text-default bg-search hover:bg-primary hover:text-white focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-2lg px-5 py-2.5 text-center flex justify-center items-center mr-2">
                            <i class="fa-solid fa-link"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                             class="z-10 w-96 hidden bg-white divide-y divide-gray-100 mt-4 border-1 border-primary rounded-md">
                            <div class="mx-6 py-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownShare">
                                <p class="text-text-default-darker text-2xl font-medium mb-4">Share this link with a friend: </p>
                                <input type="text" id="document_share"
                                       value="https://www.figma.com/file/0ZW2yQ3YX90maBglVO71nL/123dok-web-design?type=design&node-id=651-35328&t=pZZW0IIV6SMVfxQy-0"
                                       class="mb-2 border-1 border-search px-4 py-2 w-full font-normal text-xl rounded-2lg">
                                <div id="document_share_message" class="mt-2 text-[#F616B8] font-normal text-lg"></div>
                            </div>
                        </div>

                        <button type="button" data-modal-target="reportModal" data-modal-toggle="reportModal"
                                onclick="showModalReport('reportModal')"
                                class="transition duration-150 ease-in-out h-12 bg-opacity-20 text-base text-text-default bg-search hover:bg-primary hover:text-white focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-2lg px-5 py-2.5 text-center flex justify-center items-center">
                            <i class="fa-solid fa-flag"></i>
                        </button>


                        <!-- Main modal -->
                        <div id="reportModal" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full  transform translate-y-full transition-transform duration-500 ease-in-out">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 rounded-t">
                                        <h3 class="font-bold text-text-default-darker text-xl mx-auto my-2">
                                            Why do you want to report this document?
                                        </h3>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="space-y-6 px-6 py-2">
                                        <ul class="list-none">
                                            <li class="flex flex-row mb-3">
                                                <input type="radio" name="report_radio" id="report_radio_1"
                                                       class="accent-primary w-5 h-5 mt-1">
                                                <label class="ml-2 text-text-default-darker font-light text-base" for="report_radio_1">This
                                                    document contains copyright infringement</label>
                                            </li>
                                            <li class="flex flex-row mb-3">
                                                <input type="radio" name="report_radio" id="report_radio_2"
                                                       class="accent-primary w-5 h-5 mt-1">
                                                <label class="ml-2 text-text-default-darker font-light text-base" for="report_radio_2">The
                                                    content is not consistent with the description</label>
                                            </li>
                                            <li class="flex flex-row mb-3">
                                                <input type="radio" name="report_radio" id="report_radio_3"
                                                       class="accent-primary w-5 h-5 mt-1">
                                                <label class="ml-2 text-text-default-darker font-light text-base" for="report_radio_3">This
                                                    document has been duplicated</label>
                                            </li>
                                            <li class="flex flex-row mb-3">
                                                <input type="radio" name="report_radio" id="report_radio_4"
                                                       class="accent-primary w-5 h-5 mt-1">
                                                <label class="ml-2 text-text-default-darker font-light text-base" for="report_radio_4">User
                                                    has uploaded a document that belongs to me</label>
                                            </li>
                                            <li class="flex flex-row mb-3">
                                                <input type="radio" name="report_radio" id="report_radio_5"
                                                       class="accent-primary w-5 h-5 mt-1">
                                                <label class="ml-2 text-text-default-darker font-light text-base" for="report_radio_5">This
                                                    document contains copyright infringement</label>
                                            </li>
                                            <li class="flex flex-row mb-3">
                                                <input type="radio" name="report_radio" id="report_radio_other"
                                                       class="accent-primary w-5 h-5 mt-1">
                                                <label class="ml-2 text-text-default-darker font-light text-base"
                                                       for="report_radio_other">Other
                                                    reason</label>
                                            </li>
                                        </ul>
                                        <div class="mt-6 hidden" id="report_other_input">
                                            <p class="text-text-default text-base font-medium">Please inform us about your reason to report
                                                this question:</p>
                                            <textarea rows="4"
                                                      class="block mt-3 p-2.5 w-full text-base text-gray-900 rounded-lg border-1 border-text-tag"
                                                      placeholder="Write your thoughts here..."></textarea>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex justify-end items-center p-6 space-x-2">
                                        <button data-modal-hide="reportModal" type="button"
                                                class="text-primary hover:border-1 hover:border-red-600 hover:text-red-600 font-medium rounded-4xl text-base px-5 py-2.5 text-center">Cancel</button>
                                        <button data-modal-hide="reportModal" type="button"
                                                class="text-white bg-primary hover:bg-opacity-75 rounded-4xl border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10">Decline</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="md:basis-1/3 flex justify-start md:flex-row flex-col">
                    <div class="font-medium flex flex-row text-text-default mt-3 md:w-1/3">
                        <i class="fa-solid fa-book-open mt-1"></i>
                        <p class="ml-2">
                            Đại học Công nghiệp Thực phẩm Thành phố Hồ Chí Minh
                        </p>
                    </div>
                    <div class="md:ml-7 font-medium flex flex-row text-text-default mt-3">
                        <i class="fa-solid fa-book mt-1"></i>
                        <p class="ml-2">Criminal Law</p>
                    </div>
                    <div class="md:ml-7 font-medium flex flex-row text-text-default mt-3">
                        <i class="fa-solid fa-user mt-1"></i>
                        <p class="ml-2">AgentDovePerson630</p>
                    </div>
                    <div class="md:ml-7 font-medium flex flex-row text-text-default mt-3">
                        <i class="fa-solid fa-calendar-days mt-1"></i>
                        <p class="ml-2">
                            Academic year: <span class="text-[#99999A]">2021</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View document -->
<div class="bg-search bg-opacity-20 mt-8 py-4">
    <div class="container mx-auto">
        <div class="flex md:flex-row flex-col mx-4 lg:mx-0">
            <!-- Column left -->
            <div class="md:basis-9/12 bg-white">
                <div class="w-full rounded-2lg py-12" id="pdfContainer">
                </div>
                <button id="loadMoreButton"
                        class="text-primary border-1 border-primary hover:text-white hover:bg-primary mx-auto py-2 px-4 md:my-3 rounded">Xem
                    thêm</button>
            </div>

            <!-- Column right -->
            <div class="md:ml-4 mt-8 md:mt-0 md:basis-3/12 flex flex-col">
                <!-- Comment -->
                <div class="bg-white rounded-2lg p-5">
                    <p class="text-base font-se">Comment</p>
                    <input type="text"
                           class="block rounded-2lg border border-primary w-full px-3 py-4 mt-4 focus:border-primary"
                           placeholder="Comment or ask a question">
                    <div class="flex lg:justify-end justify-center">
                        <button type="button"
                                class="w-full lg:w-24 mt-3 text-white bg-primary hover:bg-opacity-90 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-2lg text-base px-5 py-2.5 flex justify-center items-center">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Post
                        </button>
                    </div>
                </div>

                <!-- Upload -->
                <div class="bg-white mt-4 rounded-2lg p-5">
                    <p class="text-base font-medium">Upload your study materials to download all documents.</p>
                    <div class="flex justify-center mt-4">
                        <button type="button"
                                class="w-full mt-3 text-white bg-primary hover:bg-opacity-90 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-2lg text-base px-5 py-2.5 flex justify-center items-center">
                            <i class="fa-solid fa-upload"></i>
                            <p class="ml-2">Choose a doc</p>
                        </button>
                    </div>
                    <p class="text-base font-light text-text-tag mt-4">Your document will be enriched, shared on 123dok to
                        assist in studying</p>
                </div>

                <!-- Related documents -->
                <div class="bg-white flex-grow mt-4 rounded-2lg p-5">
                    <p class="font-medium text-lg mt-4">Other related documents</p>

                    <div class="flex flex-wrap self-start justify-start">
                        <div class="flex flex-col mt-8 md:mx-4 w-1/2 px-1 md:w-full">
                            <div class="p-1 max-w-sm bg-white border border-gray-200 rounded-2lg shadow">
                                <a href="#">
                                    <img class="rounded h-44 w-full" src="{{ asset('images/libshare-png-2.png') }}" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mt-4 text-base text-primary font-medium">HOW TO WRITE IELTS
                                            REPORTS Ielts-Writing</h5>
                                    </a>
                                    <p class="mt-2 text-sm font-light text-text-default">Quan he kinh te</p>
                                    <div class="mt-5">
                                        <div class="flex justify-around">
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-file mt-1"></i>
                                                <p class="ml-1">12</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-download mt-1"></i>
                                                <p class="ml-1">20</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-eye mt-1"></i>
                                                <p class="ml-1">70</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-8 md:mx-4 w-1/2 px-1 md:w-full">
                            <div class="p-1 max-w-sm bg-white border border-gray-200 rounded-2lg shadow">
                                <img class="rounded h-44 w-full" src="{{ asset('images/document/document1.png')}}" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mt-4 text-base text-primary font-medium">HOW TO WRITE IELTS
                                            REPORTS Ielts-Writing</h5>
                                    </a>
                                    <p class="mt-2 text-sm font-light text-text-default">Quan he kinh te</p>
                                    <div class="mt-5">
                                        <div class="flex justify-around">
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-file mt-1"></i>
                                                <p class="ml-1">12</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-download mt-1"></i>
                                                <p class="ml-1">20</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-eye mt-1"></i>
                                                <p class="ml-1">70</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-8 md:mx-4 w-1/2 px-1 md:w-full">
                            <div class="p-1 max-w-sm bg-white border border-gray-200 rounded-2lg shadow">
                                <img class="rounded h-44 w-full" src="{{ asset('images/document/document2.png')}}" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mt-4 text-base text-primary font-medium">HOW TO WRITE IELTS
                                            REPORTS Ielts-Writing</h5>
                                    </a>
                                    <p class="mt-2 text-sm font-light text-text-default">Quan he kinh te</p>
                                    <div class="mt-5">
                                        <div class="flex justify-around">
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-file mt-1"></i>
                                                <p class="ml-1">12</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-download mt-1"></i>
                                                <p class="ml-1">20</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-eye mt-1"></i>
                                                <p class="ml-1">70</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-8 md:mx-4 w-1/2 px-1 md:w-full">
                            <div class="p-1 max-w-sm bg-white border border-gray-200 rounded-2lg shadow">
                                <img class="rounded h-44 w-full" src="{{ asset('images/libshare-png-2.png')}}" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mt-4 text-base text-primary font-medium">HOW TO WRITE IELTS
                                            REPORTS Ielts-Writing</h5>
                                    </a>
                                    <p class="mt-2 text-sm font-light text-text-default">Quan he kinh te</p>
                                    <div class="mt-5">
                                        <div class="flex justify-around">
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-file mt-1"></i>
                                                <p class="ml-1">12</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-download mt-1"></i>
                                                <p class="ml-1">20</p>
                                            </div>
                                            <div class="font-light flex flex-row text-text-tag">
                                                <i class="fa-solid fa-eye mt-1"></i>
                                                <p class="ml-1">70</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Preview text -->
        <div class="bg-white mt-4 mx-4 lg:mx-0 rounded-2lg pb-8">
            <p class="font-semibold text-xl md:pl-14 pl-7 pt-10 text-text-default-darker mb-3">Preview text</p>
            <div class="md:mx-11 mx-6 py-5 px-7 border border-search rounded-2lg">
                <p class="text-text-default-darker text-base font-normal overscroll-auto overflow-y-scroll h-64">
                    Only badly designed bonuses create a focus on the short term. But with ‘clawbacks’or bonuses paid
                    based on long-term performance of an investment, executives are encouraged to look into the future.
                    This is particularly so where co mpensation is in the form of shares, as then personal wealth is
                    directly linked to the company’s value. It is a caricature to paint developing countries as lacking
                    education systems; most do, and progress is rapid. Between 2000 and 2008, the enrolment rate in
                    primary education globally rose from 80.
                    <br>
                    <br>
                    <br>

                    Only badly designed bonuses create a focus on the short term. But with ‘clawbacks’or bonuses paid
                    based on long-term performance of an investment, executives are encouraged to look into the future.
                    This is particularly so where co mpensation is in the form of shares, as then personal wealth is
                    directly linked to the company’s value. It is a caricature to paint developing countries as lacking
                    education systems; most do, and progress is rapid. Between 2000 and 2008, the enrolment rate in
                    primary education globally rose from 80.
                    <br>
                    <br>
                    <br>

                    Only badly designed bonuses create a focus on the short term. But with ‘clawbacks’or bonuses paid
                    based on long-term performance of an investment, executives are encouraged to look into the future.
                    This is particularly so where co mpensation is in the form of shares, as then personal wealth is
                    directly linked to the company’s value. It is a caricature to paint developing countries as lacking
                    education systems; most do, and progress is rapid. Between 2000 and 2008, the enrolment rate in
                    primary education globally rose from 80.
                    <br>
                    <br>
                    <br>

                    This debate will inevitably tend to focus on bankers,because their bonuses tend to cause such uproar in the
                    media, but bonuses are also a very common way of remunerating all sorts of executives. Many states have
                    taken
                    steps to limit bonuses, both in state-owned banks (especially the UK) and private sector ones too (e.g.
                    Switzerland). Bonuses can come in cash or shares; the latter can be less desirable to CEOs especially, as
                    they
                    are often prevented from selling them for a limited period. Inevitably, steps might be taken to evade such
                    limits
                    providing authoritative advice on debating technique, the book covers the rules, structure and type of
                    debate,
                    offering tips on how to become a successful speaker. It is a key read for debaters at any level.
                    <br>
                    <br>
                    <br>
                    <span class="font-bold">The English-Speaking Union (ESU)</span> builds bridges between people and nations
                    through the use of the English language. Its debate and public speaking competitions are among the most
                    prestigious and the longest running in the debate calendar.The ESU’s mentors also tour the world to coach
                    and
                    advise debate students of all ages.The ESU’s path-finding speech and debate work is coupled with a worldwide
                    programme of cross-generational education scholarships which places the English-Speaking Union in the van of
                    thinkers, deliverers and facilitators in creating life-changing educational opportunities for people,
                    whatever
                    their age and social background. This debate will inevitably tend to focus on bankers,because their bonuses
                    tend to cause such uproar in the media, but bonuses are also a very common way of remunerating all sorts of
                    executives. Many states have taken steps to limit bonuses, both in state-owned banks (especially the UK) and
                    private sector ones too (e.g. Switzerland). Bonuses can come in cash or shares , deliverers and facilitators
                    in creating life-changing educational opportunities for people, whatever their age and social background.
                </p>
            </div>
        </div>

        <!-- Figure -->
        <div class="bg-white mt-4 mx-4 lg:mx-0 rounded-2lg pb-8">
            <p class="font-semibold text-xl md:pl-14 pl-7 pt-10 text-text-default-darker mb-3">Figure</p>
            <div class="md:mx-11 mx-6 py-5 px-7 border border-search rounded-2lg">

                <div class="w-full mb-10 flex justify-center flex-col">
                    <img class="h-auto max-w-full mx-auto border lazy-load lazy loaded" src="{{ asset('images/document/figure1.webp')}}"
                         alt="image description">
                    <figcaption class="mt-3 inline-block italic">
                        <p class="font-bold inline-block">Hình 2.1. </p>
                        Struktur Organisasi
                        <i class="text-primary text-sm inline-block">p.25</i>
                    </figcaption>
                </div>

                <div class="w-full mb-10 flex justify-center flex-col">
                    <img class="h-auto max-w-full mx-auto border lazy-load lazy loaded" src="{{ asset('images/document/figure1.webp')}}"
                         alt="image description">
                    <figcaption class="mt-3 inline-block italic">
                        <p class="font-bold inline-block">Hình 2.1. </p>
                        Struktur Organisasi
                        <i class="text-primary text-sm inline-block">p.25</i>
                    </figcaption>
                </div>

                <div class="w-full mb-10 flex justify-center flex-col">
                    <img class="h-auto max-w-full mx-auto border lazy-load lazy loaded" src="{{ asset('images/document/figure1.webp')}}"
                         alt="image description">
                    <figcaption class="mt-3 inline-block italic">
                        <p class="font-bold inline-block">Hình 2.1. </p>
                        Struktur Organisasi
                        <i class="text-primary text-sm inline-block">p.25</i>
                    </figcaption>
                </div>

                <div class="w-full mb-10 flex justify-center flex-col">
                    <img class="h-auto max-w-full mx-auto border lazy-load lazy loaded" src="{{ asset('images/document/figure1.webp')}}"
                         alt="image description">
                    <figcaption class="mt-3 inline-block italic">
                        <p class="font-bold inline-block">Hình 2.1. </p>
                        Struktur Organisasi
                        <i class="text-primary text-sm inline-block">p.25</i>
                    </figcaption>
                </div>

            </div>
        </div>

        <!-- Reference -->
        <div class="bg-white mt-4 mx-4 lg:mx-0 rounded-2lg pb-8">
            <p class="font-semibold text-xl md:pl-14 pl-7 pt-10 text-text-default-darker mb-3">Reference</p>
            <div class="md:mx-11 mx-6 py-5 px-7 border border-search rounded-2lg">
                <p class="text-text-default-darker text-base font-light">
                    Crane A, Matten D and Spence L 2008, ‘CSR: readings and cases in a global context’, International Journal of
                    Environmental, Vol18, No 3, pp 641-652
                    <br>
                    <br>
                    Calma J 2020, ‘Intel climate change envỉonment goals 2030’, theverge, 14 May, viewed 30 April 2021,
                    <br>
                    <br>
                    Caroll A 1991, ‘The pyramid of CSR: Toward the moral management of organizational stakeholders’, Business
                    Horizons, Vol 34, No 4, pp 39-48
                    <br><br>
                    Freman E 2010, ‘Strategics Management: A stakeholder Approach’, Cambridge Uni press 2010, print Freeman E,
                    Dmytriyeva S and Strand R 2017, ‘Managing Stakeholders in Digital Age’, CSR: Strategy, Communication,
                    Governance,Cambridge Uni Press, pp. 136 – 153
                    <br><br>
                    Caroll A 1991, ‘The pyramid of CSR: Toward the moral management of organizational stakeholders’, Business
                    Horizons, Vol 34, No 4, pp 39-48
                    <br><br>
                    Greening D & Turban D 2000, ‘CSR as a Competitive Advantage in Attracting a quality workforce', Business and
                    Society, Vol39, No.3, pp 254-208 High Tech 2019, ‘AMD commands 30CPU market share for the first time in
                    twelve years according to lastest CPU benchmark data, Scoopernews, 12 October, viewed 30 April 2021,
                    <br><br>
                    Intel 2019, ‘Intel 2019 Annual report', Intel, n.d, viewed 30 April 2021,
                    <br><br>
                    Marrewijk M 2003. ‘Concepts and Definitions of CSR and corporate sustainability: Between agency and
                    communion.’, Journal Of Business Ethics, Vol 44
                    <br><br>
                <p class="font-normal">
                    <span class="font-bold">See more:</span> <span class="text-primary">The Pros and Cons of Trade Deficits and
              Surpluses</span>, The Pros and Cons of Trade Deficits and Surpluses
                </p>
                </p>
            </div>
        </div>

        <!-- Related Keywords -->
        <div class="bg-white mt-4 mx-4 lg:mx-0 rounded-2lg pb-8">
            <p class="font-semibold text-xl md:pl-14 pl-7 pt-10 text-text-default-darker mb-3">Related Keywords</p>
            <div class="md:mx-11 mx-6 py-5 rounded-2lg text-left">
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">Bahasa
                    Inggris Kelas XI</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">The
                    pros and cons of plea bargains</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">Understand
                    the pros and cons of dynamic</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">7
                    a controversial period the pros and cons of a standard series</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons of automation for immunohistochemistry</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">weigh
                    the pros and cons of each alternative</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">where
                    s the reciprocity when asymmetries of trade exist</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">The
                    pros and cons of outsourcing</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons of a potential myeloprotective agent</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    national welfare effects of trade imbalances</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">the
                    pros and cons</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">7
                    a controversial period the pros and cons of a standard series</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">The
                    pros and cons of plea bargains</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">SOAL
                    BAHASA INGGRIS KELAS XI SEMESTER 2</a>
                <a href="#"
                   class="font-light text-base break-all text-text-default-darker hover:text-primary border border-gray-400 hover:border-primary inline-block rounded-2lg my-1 mx-1 px-2 py-1 ">Bahasa
                    Inggris Kelas XI</a>
            </div>
        </div>

        <!-- Students also viewed -->
        <div class="bg-white mt-4 mx-4 lg:mx-0 rounded-2lg pb-8">
            <p class="font-semibold text-xl md:pl-14 pl-3 pt-10 text-text-default-darker mb-3">Students also viewed</p>
            <div class="md:mx-11 py-5 px-3">
                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">Homework Questions with Solutions - Theory of Probability</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">Probability Theory - Assignment 1 with Solutions</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">KHO Ý TƯỞNG Writing TASK 2 (FULL Version)</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">Problems Solutions - Introduction to the Theory of Probability</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">KHO Ý TƯỞNG Writing TASK 2 (FULL Version)</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">Homework Questions with Solutions - Theory of Probability</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">Probability Theory - Assignment 1 with Solutions</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">KHO Ý TƯỞNG Writing TASK 2 (FULL Version)</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">Problems Solutions - Introduction to the Theory of Probability</p>
                </div>

                <div class="px-4 py-2 mb-3 border-t-1/2 border-opacity-60 border-t-text-tag text-primary flex flex-row">
                    <i class="fa-solid fa-file-lines pt-1"></i>
                    <p class="ml-2 text-base font-normal">KHO Ý TƯỞNG Writing TASK 2 (FULL Version)</p>
                </div>

                <button
                    class="py-3 w-full mt-3 text-base font-medium text-primary rounded-full border-2 border-primary hover:bg-primary hover:text-white">
                    Show more
                    <i class="fa-solid fa-angle-down ml-3"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<footer class="border-t border-solid mb-4">
    <div class="container mt-6 mb-2 mx-auto w-11/12">
        <div class="flex flex-wrap">
            <div class="basis-full mb-8 md:basis-1/5">
                <img class="mx-auto md:mx-0 w-[104px] object-cover" src="{{ asset('images/libshare-png-2.png')}}" alt="" />
            </div>
            <div class="basis-1/2 mb-8 md:basis-1/5">
                <h2 class="font-medium text-lg mb-4">Company</h2>
                <div class="flex flex-col gap-2">
                    <a href="" class="font-normal text-base text-text-default-darker">About</a>
                    <a href="" class="font-normal text-base text-text-default-darker">Scholarships</a>
                    <a href="" class="font-normal text-base text-text-default-darker">Blog</a>
                    <a href="" class="font-normal text-base text-text-default-darker">Sitemap</a>
                </div>
            </div>
            <div class="basis-1/2 mb-8 md:basis-1/5">
                <h2 class="font-medium text-lg mb-4">Contact & Help</h2>
                <div class="flex flex-col gap-2">
                    <a href="" class="font-normal text-base text-text-default-darker">Contacy us</a>
                    <a href="" class="font-normal text-base text-text-default-darker">FAQ</a>
                    <a href="" class="font-normal text-base text-text-default-darker">Feedback</a>
                </div>
            </div>

            <div class="basis-1/2 mb-8 md:basis-1/5">
                <h2 class="font-medium text-lg mb-4">Legal</h2>
                <div class="flex flex-col gap-2">
                    <a href="" class="font-normal text-base text-text-default-darker">Terms</a>
                    <a href="" class="font-normal text-base text-text-default-darker">Privacy Policy</a>
                    <a href="" class="font-normal text-base text-text-default-darker">Cookie Statement</a>
                </div>
            </div>
            <div class="basis-1/2 mb-8 md:basis-1/5 flex flex-col gap-2">
                <a href="" class="inline-block w-[104px] h-10 bg-black rounded">
                    <img class="max-w-full object-cover" src="{{ asset('images/document/gg.png')}}" alt="" />
                </a>
                <a href="" class="inline-block w-[104px] h-10 bg-black rounded">
                    <img class="max-w-full object-cover" src="{{ asset('images/document/appstore.png')}}" alt="" />
                </a>
            </div>
        </div>
        <div class="flex justify-between mt-12 flex-wrap items-center">
            <div class="flex gap-6 basis-full md:basis-auto justify-between">
                <a href="">
                    <img src="{{ asset('images/document/facebook.png')}}" alt="" />
                </a>
                <a href="">
                    <img src="{{ asset('images/document/intagam.png')}}" alt="" />
                </a>
                <a href="">
                    <img src="{{ asset('images/document/linkin.png')}}" alt="" />
                </a>
                <a href="">
                    <img src="{{ asset('images/document/tiktok.png')}}" alt="" />
                </a>
                <a href="">
                    <img src="{{ asset('images/document/youtube.png')}}" alt="" />
                </a>
                <a href="">
                    <img src="{{ asset('images/document/twiter.png')}}" alt="" />
                </a>
            </div>
            <p class="basis-full md:basis-auto text-center mt-8 md:mt-0">
                Copyright libshare.xyz © 2023
            </p>
        </div>
    </div>
</footer>
<!-- Show modal sidebar -->
<div id="modal_menu" class="modal invisible fixed z-50 top-0 h-screen w-full bg-[#AFAFAF] bg-opacity-50">
    <div id="modal_menu_content"
         class="flex flex-col bg-white h-full px-6 py-8 md:p-10 max-w-max transition-all duration-200 ease-in-out">
        <div class="flex gap-4 mb-8 items-center justify-between">
            <div class="flex gap-4 items-center">
                <svg id="modal_menu_icon" class="w-12 h-12" viewBox="0 0 48 48" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 14H38" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                    <path d="M10 24H38" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                    <path d="M10 34H38" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                </svg>
                <img src="{{ asset('images/document/logo.png')}}" alt="" class="max-h-8" />
            </div>
            <svg id="close_modal" onclick="closeModal()" class="md:hidden w-9 hover:cursor-pointer" viewBox="0 0 34 32"
                 fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.3381 8L8.5957 24" stroke="#33363F" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                <path d="M8.59546 8L25.3379 24" stroke="#33363F" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
            </svg>
        </div>
        <div class="p-2 grow overflow-y-auto no-scrollbar">
            <div class="p-2.5">
          <span
              class="inline-flex w-8 h-8 bg-[#5D789B] rounded-full text-white text-base font-medium items-center justify-center">
            N
          </span>
                <span class="text-base text-text-default ml-2">Phan Thi Minh Nguyet</span>
            </div>
            <div class="flex items-center gap-2 p-4 bg-[#80D3C3] rounded-xl">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.66089 0.694775L1.26089 4.07194C0.718401 4.48831 0.400391 5.13328 0.400391 5.81714V13.2333C0.400391 13.8408 0.892877 14.3333 1.50039 14.3333H3.70039C4.3079 14.3333 4.80039 13.8408 4.80039 13.2333V10.3C4.80039 9.69248 5.29288 9.19999 5.90039 9.19999H8.10039C8.7079 9.19999 9.20039 9.69248 9.20039 10.3V13.2333C9.20039 13.8408 9.69288 14.3333 10.3004 14.3333H12.5004C13.1079 14.3333 13.6004 13.8408 13.6004 13.2333V5.81714C13.6004 5.13328 13.2824 4.48831 12.7399 4.07194L8.3399 0.694775C7.54984 0.0883765 6.45094 0.0883765 5.66089 0.694775Z"
                        fill="#00A888" />
                </svg>
                <span class="text-primary font-medium text-base">Home</span>
            </div>
            <ul id="my_library" class="mt-4 flex flex-col gap-2">
                <span class="font-medium"> My library </span>
                <li class="">
                    <div
                        class="drop-down flex p-4 justify-between items-center gap-10 hover:bg-[#80D3C3] rounded-xl group hover:cursor-pointer peer">
                        <div class="flex items-center gap-2">
                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.5 0.666656H1.5C1.10218 0.666656 0.720644 0.82118 0.43934 1.09623C0.158035 1.37129 0 1.74434 0 2.13332V13.8667C0 14.2556 0.158035 14.6287 0.43934 14.9037C0.720644 15.1788 1.10218 15.3333 1.5 15.3333H10.5C10.8978 15.3333 11.2794 15.1788 11.5607 14.9037C11.842 14.6287 12 14.2556 12 13.8667V5.06666L7.5 0.666656ZM7.33333 1.99999V5.33332H10.6667L7.33333 1.99999ZM3.33333 5.12499C2.85008 5.12499 2.45833 5.51674 2.45833 5.99999C2.45833 6.48324 2.85008 6.87499 3.33333 6.87499H4.66667C5.14992 6.87499 5.54167 6.48324 5.54167 5.99999C5.54167 5.51674 5.14992 5.12499 4.66667 5.12499H3.33333ZM3.33333 7.79166C2.85008 7.79166 2.45833 8.18341 2.45833 8.66666C2.45833 9.14991 2.85008 9.54166 3.33333 9.54166H8.66667C9.14992 9.54166 9.54167 9.14991 9.54167 8.66666C9.54167 8.18341 9.14992 7.79166 8.66667 7.79166H3.33333ZM3.33333 10.4583C2.85008 10.4583 2.45833 10.8501 2.45833 11.3333C2.45833 11.8166 2.85008 12.2083 3.33333 12.2083H8.66667C9.14992 12.2083 9.54167 11.8166 9.54167 11.3333C9.54167 10.8501 9.14992 10.4583 8.66667 10.4583H3.33333Z"
                                      fill="#00A888" />
                            </svg>
                            <span class="font-thin text-text-default group-hover:text-white group-[.active]:text-white">
                  Downloaded documents
                </span>
                        </div>
                        <svg class="group-[.active]:hidden" width="14" height="9" viewBox="0 0 14 9" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 1L7 7L1 1" stroke="#33363F" stroke-width="2" />
                        </svg>
                        <svg class="hidden group-[.active]:block" width="20" height="14" data-name="Layer 1" id="Layer_1"
                             viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <title />
                            <path d="M32,12.5,64,45.17,57.38,51.5,32,25.24,6.62,51.5,0,45.17Z" data-name="&lt;Compound Path&gt;"
                                  id="_Compound_Path_" />
                        </svg>
                    </div>
                    <ul
                        class="drop-down_content flex flex-col gap-4 px-4 h-0 max-w-sm overflow-hidden peer-[.active]:h-max peer-[.active]:overflow-y-auto peer-[.active]:py-4 transition-all duration-200">
                        <li class="px-2">
                            <span class="font-thin text-text-default">To build a fire - Jack London</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">TED Talk - Lian Pin Koh - Conservation by drones</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">ILS-L2-Transcripts - ILS-L2-Transcripts</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">A Brief History of India/ Lịch sử văn minh Ấn Độ</span>
                        </li>
                        <li class="px-2">
                <span class="font-thin text-text-default">
                  CÂU HỎI ÔN TẬP MÔN TRIẾT - wwww</span>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <div
                        class="drop-down flex p-4 justify-between items-center gap-10 hover:bg-[#80D3C3] rounded-xl group hover:cursor-pointer peer">
                        <div class="flex items-center gap-2">
                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2.33333 0.666687C1.71449 0.666687 1.121 0.91252 0.683417 1.3501C0.245833 1.78769 0 2.38118 0 3.00002V13C0 13.6189 0.245833 14.2124 0.683417 14.6499C1.121 15.0875 1.71449 15.3334 2.33333 15.3334H11.3333C11.7015 15.3334 12 15.0349 12 14.6667V1.33335C12 0.965164 11.7015 0.666687 11.3333 0.666687H2.33333ZM2.66667 11H11V14.3334H2.66667C1.74619 14.3334 1 13.5872 1 12.6667C1 11.7462 1.74619 11 2.66667 11Z"
                                      fill="#00A888" />
                            </svg>

                            <span class="font-thin text-text-default group-hover:text-white group-[.active]:text-white">
                  Recent documents
                </span>
                        </div>
                        <svg class="group-[.active]:hidden" width="14" height="9" viewBox="0 0 14 9" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 1L7 7L1 1" stroke="#33363F" stroke-width="2" />
                        </svg>
                        <svg class="hidden group-[.active]:block" width="20" height="14" data-name="Layer 1" id="Layer_1"
                             viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <title />
                            <path d="M32,12.5,64,45.17,57.38,51.5,32,25.24,6.62,51.5,0,45.17Z" data-name="&lt;Compound Path&gt;"
                                  id="_Compound_Path_" />
                        </svg>
                    </div>
                    <ul
                        class="drop-down_content flex flex-col gap-4 px-4 h-0 max-w-sm overflow-hidden peer-[.active]:h-max peer-[.active]:overflow-y-auto peer-[.active]:py-4 transition-all duration-200">
                        <li class="px-2">
                            <span class="font-thin text-text-default">To build a fire - Jack London</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">TED Talk - Lian Pin Koh - Conservation by drones</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">ILS-L2-Transcripts - ILS-L2-Transcripts</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">A Brief History of India/ Lịch sử văn minh Ấn Độ</span>
                        </li>
                        <li class="px-2">
                <span class="font-thin text-text-default">
                  CÂU HỎI ÔN TẬP MÔN TRIẾT - wwww</span>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <div
                        class="drop-down flex p-4 justify-between items-center gap-10 hover:bg-[#80D3C3] rounded-xl group hover:cursor-pointer peer">
                        <div class="flex items-center gap-2">
                            <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.33398 0C0.7817 0 0.333984 0.447716 0.333984 1V9.55556C0.333984 10.1078 0.7817 10.5556 1.33398 10.5556H5.46732C6.05079 10.5556 6.61037 10.778 7.02295 11.1739C7.43553 11.5698 7.66732 12.1068 7.66732 12.6667V2.81481C7.66732 2.06828 7.35827 1.35232 6.80816 0.82444C6.25806 0.29656 5.51195 0 4.73398 0H1.33398ZM14.6673 0C15.2196 0 15.6673 0.447716 15.6673 1V9.55556C15.6673 10.1078 15.2196 10.5556 14.6673 10.5556H10.534C9.95051 10.5556 9.39093 10.778 8.97835 11.1739C8.56577 11.5698 8.33398 12.1068 8.33398 12.6667V2.81482C8.33398 2.06828 8.64303 1.35232 9.19314 0.82444C9.74324 0.29656 10.4893 0 11.2673 0H14.6673Z"
                                      fill="#00A888" />
                            </svg>

                            <span class="font-thin text-text-default group-hover:text-white group-[.active]:text-white">
                  Schools
                </span>
                        </div>
                        <svg class="group-[.active]:hidden" width="14" height="9" viewBox="0 0 14 9" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 1L7 7L1 1" stroke="#33363F" stroke-width="2" />
                        </svg>
                        <svg class="hidden group-[.active]:block" width="20" height="14" data-name="Layer 1" id="Layer_1"
                             viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <title />
                            <path d="M32,12.5,64,45.17,57.38,51.5,32,25.24,6.62,51.5,0,45.17Z" data-name="&lt;Compound Path&gt;"
                                  id="_Compound_Path_" />
                        </svg>
                    </div>
                    <ul
                        class="drop-down_content flex flex-col gap-4 px-4 h-0 max-w-sm overflow-hidden peer-[.active]:h-max peer-[.active]:overflow-y-auto peer-[.active]:py-4 transition-all duration-200">
                        <li class="px-2">
                            <span class="font-thin text-text-default">To build a fire - Jack London</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">TED Talk - Lian Pin Koh - Conservation by drones</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">ILS-L2-Transcripts - ILS-L2-Transcripts</span>
                        </li>
                        <li class="px-2">
                            <span class="font-thin text-text-default">A Brief History of India/ Lịch sử văn minh Ấn Độ</span>
                        </li>
                        <li class="px-2">
                <span class="font-thin text-text-default">
                  CÂU HỎI ÔN TẬP MÔN TRIẾT - wwww</span>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <div
                        class="drop-down flex p-4 justify-between items-center gap-10 hover:bg-[#80D3C3] rounded-xl group hover:cursor-pointer peer">
                        <div class="flex items-center gap-2">
                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.6673 9.2222C13.6673 9.61512 13.5112 9.99194 13.2334 10.2698C12.9556 10.5476 12.5788 10.7037 12.1858 10.7037H3.50405C3.37145 10.7037 3.24427 10.7564 3.1505 10.8501L1.18754 12.8131C0.872555 13.1281 0.333984 12.905 0.333984 12.4595V1.81479C0.333984 1.42188 0.490069 1.04506 0.7679 0.767229C1.04573 0.489397 1.42255 0.333313 1.81547 0.333313H12.1858C12.5788 0.333313 12.9556 0.489397 13.2334 0.767229C13.5112 1.04506 13.6673 1.42188 13.6673 1.81479V9.2222Z"
                                    fill="#00A888" />
                            </svg>

                            <span class="font-thin text-text-default group-hover:text-white group-[.active]:text-white">
                  My community
                </span>
                        </div>
                    </div>
                    <div
                        class="drop-down_content flex flex-col gap-4 px-4 h-0 max-w-sm overflow-hidden peer-[.active]:h-max peer-[.active]:overflow-y-auto peer-[.active]:py-4 transition-all duration-200">
                        <p class="text-text-default">
                            You don’t have any documents yet
                        </p>
                    </div>
                </li>
                <li class="">
                    <div
                        class="drop-down flex p-4 justify-between items-center gap-10 hover:bg-[#80D3C3] rounded-xl group hover:cursor-pointer peer">
                        <div class="flex items-center gap-2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.33268 10.6667H10.666C11.9231 10.6667 12.5516 10.6667 12.9422 10.2761C13.3327 9.88562 13.3327 9.25708 13.3327 8V4.66667C13.3327 3.40959 13.3327 2.78105 12.9422 2.39052C12.5516 2 11.9231 2 10.666 2H5.33268C4.0756 2 3.44706 2 3.05654 2.39052C2.66602 2.78105 2.66602 3.40959 2.66602 4.66667V12.3333C2.66602 11.4129 3.41221 10.6667 4.33268 10.6667ZM5.99935 3.33333C4.89478 3.33333 3.99935 4.22876 3.99935 5.33333C3.99935 6.4379 4.89478 7.33333 5.99935 7.33333L9.99935 7.33333C11.1039 7.33333 11.9993 6.4379 11.9993 5.33333C11.9993 4.22876 11.1039 3.33333 9.99935 3.33333L5.99935 3.33333Z"
                                      fill="#00A888" />
                                <path
                                    d="M12.9422 10.2761L12.2351 9.56903L12.2351 9.56904L12.9422 10.2761ZM12.9422 2.39052L12.2351 3.09763L12.2351 3.09763L12.9422 2.39052ZM3.99935 5.33333H4.99935H3.99935ZM5.99935 3.33333V2.33333V3.33333ZM5.99935 7.33333L5.99935 6.33333H5.99935V7.33333ZM9.99935 7.33333L9.99935 8.33333H9.99935V7.33333ZM11.9993 5.33333L12.9993 5.33333V5.33333H11.9993ZM9.99935 3.33333V2.33333V3.33333ZM10.666 9.66667H4.33268V11.6667H10.666V9.66667ZM12.2351 9.56904C12.2344 9.56964 12.2344 9.56961 12.2349 9.56924C12.2353 9.56886 12.2357 9.56865 12.2356 9.56871C12.2355 9.56878 12.2343 9.56952 12.2318 9.57085C12.2292 9.5722 12.2248 9.57435 12.2181 9.57712C12.189 9.58907 12.1245 9.60946 11.9958 9.62677C11.7148 9.66454 11.3228 9.66667 10.666 9.66667V11.6667C11.2663 11.6667 11.8171 11.6688 12.2623 11.6089C12.7363 11.5452 13.2372 11.3953 13.6493 10.9832L12.2351 9.56904ZM12.3327 8C12.3327 8.65681 12.3306 9.04882 12.2928 9.32978C12.2755 9.45853 12.2551 9.52301 12.2431 9.55205C12.2404 9.55877 12.2382 9.56319 12.2369 9.56577C12.2355 9.56831 12.2348 9.56945 12.2347 9.56955C12.2347 9.56965 12.2349 9.56933 12.2353 9.56886C12.2356 9.5684 12.2357 9.56843 12.2351 9.56903L13.6493 10.9832C14.0613 10.5712 14.2112 10.0703 14.275 9.59628C14.3348 9.15107 14.3327 8.60027 14.3327 8H12.3327ZM12.3327 4.66667V8H14.3327V4.66667H12.3327ZM12.2351 3.09763C12.2357 3.09824 12.2356 3.09826 12.2353 3.0978C12.2349 3.09734 12.2347 3.09702 12.2347 3.09711C12.2348 3.09722 12.2355 3.09835 12.2369 3.1009C12.2382 3.10347 12.2404 3.10789 12.2431 3.11462C12.2551 3.14366 12.2755 3.20814 12.2928 3.33689C12.3306 3.61785 12.3327 4.00986 12.3327 4.66667H14.3327C14.3327 4.0664 14.3348 3.5156 14.275 3.07039C14.2112 2.59642 14.0613 2.09545 13.6493 1.68342L12.2351 3.09763ZM10.666 3C11.3228 3 11.7148 3.00212 11.9958 3.0399C12.1245 3.05721 12.189 3.0776 12.2181 3.08954C12.2248 3.09231 12.2292 3.09447 12.2318 3.09581C12.2343 3.09714 12.2355 3.09788 12.2356 3.09795C12.2357 3.09801 12.2353 3.0978 12.2349 3.09743C12.2344 3.09705 12.2344 3.09702 12.2351 3.09763L13.6493 1.68342C13.2372 1.27139 12.7363 1.12146 12.2623 1.05773C11.8171 0.997876 11.2663 1 10.666 1V3ZM5.33268 3H10.666V1H5.33268V3ZM3.76365 3.09763C3.76426 3.09702 3.76428 3.09705 3.76382 3.09743C3.76335 3.0978 3.76304 3.09801 3.76313 3.09795C3.76324 3.09788 3.76437 3.09714 3.76691 3.09581C3.76949 3.09447 3.77391 3.09231 3.78063 3.08954C3.80967 3.0776 3.87416 3.05721 4.0029 3.0399C4.28386 3.00212 4.67587 3 5.33268 3V1C4.73241 1 4.18161 0.997876 3.73641 1.05773C3.26243 1.12146 2.76146 1.27139 2.34943 1.68342L3.76365 3.09763ZM3.66602 4.66667C3.66602 4.00986 3.66814 3.61785 3.70591 3.33689C3.72322 3.20814 3.74361 3.14366 3.75556 3.11462C3.75833 3.10789 3.76048 3.10347 3.76183 3.10089C3.76316 3.09835 3.7639 3.09722 3.76397 3.09711C3.76403 3.09702 3.76382 3.09734 3.76344 3.0978C3.76307 3.09826 3.76304 3.09824 3.76365 3.09763L2.34943 1.68342C1.9374 2.09545 1.78747 2.59642 1.72375 3.07039C1.66389 3.5156 1.66602 4.0664 1.66602 4.66667H3.66602ZM3.66602 12.3333V4.66667H1.66602V12.3333H3.66602ZM4.33268 9.66667C2.85992 9.66667 1.66602 10.8606 1.66602 12.3333H3.66602C3.66602 11.9651 3.96449 11.6667 4.33268 11.6667V9.66667ZM4.99935 5.33333C4.99935 4.78105 5.44706 4.33333 5.99935 4.33333V2.33333C4.34249 2.33333 2.99935 3.67648 2.99935 5.33333H4.99935ZM5.99935 6.33333C5.44706 6.33333 4.99935 5.88562 4.99935 5.33333H2.99935C2.99935 6.99019 4.34249 8.33333 5.99935 8.33333V6.33333ZM9.99935 6.33333L5.99935 6.33333L5.99935 8.33333L9.99935 8.33333L9.99935 6.33333ZM10.9993 5.33333C10.9993 5.88562 10.5516 6.33333 9.99935 6.33333V8.33333C11.6562 8.33333 12.9993 6.99019 12.9993 5.33333L10.9993 5.33333ZM9.99935 4.33333C10.5516 4.33333 10.9993 4.78105 10.9993 5.33333H12.9993C12.9993 3.67648 11.6562 2.33333 9.99935 2.33333V4.33333ZM5.99935 4.33333L9.99935 4.33333V2.33333L5.99935 2.33333V4.33333ZM7.33268 13H4.33268V15H7.33268V13ZM1.66602 12.3333C1.66602 13.8061 2.85992 15 4.33268 15V13C3.96449 13 3.66602 12.7015 3.66602 12.3333H1.66602Z"
                                    fill="#00A888" />
                                <path d="M13.3327 14H6.66602" stroke="#00A888" stroke-width="2" stroke-linecap="round" />
                            </svg>

                            <span class="font-thin text-text-default group-hover:text-white group-[.active]:text-white">
                  Subjects
                </span>
                        </div>
                    </div>
                    <div
                        class="drop-down_content flex flex-col gap-4 px-4 h-0 max-w-sm overflow-hidden peer-[.active]:h-max peer-[.active]:overflow-y-auto peer-[.active]:py-4 transition-all duration-200">
                        <p class="text-text-default">
                            You don’t have any documents yet
                        </p>
                    </div>
                </li>
                <li class="">
                    <div
                        class="drop-down flex p-4 justify-between items-center gap-10 hover:bg-[#80D3C3] rounded-xl group hover:cursor-pointer peer">
                        <div class="flex items-center gap-2">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.6673 7C13.6673 3.3181 10.6826 0.333329 7.00065 0.333329C3.31875 0.333329 0.333984 3.3181 0.333984 7C0.333984 10.342 2.79314 13.1097 6.00065 13.5922V8.08088L4.37442 9.7071L2.96021 8.29289L6.29354 4.95956L7.00065 4.25245L7.70776 4.95956L11.0411 8.29289L9.62688 9.7071L8.00065 8.08088V13.5922C11.2082 13.1097 13.6673 10.342 13.6673 7Z"
                                      fill="#00A888" />
                            </svg>

                            <span class="font-thin text-text-default group-hover:text-white group-[.active]:text-white">
                  Uploads
                </span>
                        </div>
                    </div>
                    <div
                        class="drop-down_content flex flex-col gap-4 px-4 h-0 max-w-sm overflow-hidden peer-[.active]:h-max peer-[.active]:overflow-y-auto peer-[.active]:py-4 transition-all duration-200">
                        <p class="text-text-default">
                            You don’t have any documents yet
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('assets/plugins/pdfjs/build/pdf.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

{{-- Alpine js--}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('searchs', () => ({
            search: '',
            searchs: [
                {
                    "name": "Ozella Heaney",
                    "content": "Nihil repellat ab quia reiciendis et. Eum odio vero aut. Nemo magnam quia optio officiis distinctio exercitationem eligendi id. Cumque aut aut assumenda et veritatis."
                }, {
                    "name": "Lindsey Hansen",
                    "content": "Libero magnam nostrum non nobis quidem dolor. Optio illo occaecati laboriosam. Inventore voluptas aut quia accusamus dolores quia ea totam."
                }, {
                    "name": "Raymond Mante",
                    "content": "Modi natus expedita eos mollitia voluptates eum. Aut quaerat molestias omnis a dolor. Vel dolorem est quia."
                }, {
                    "name": "Alyson Schimmel",
                    "content": "Laboriosam velit est assumenda aperiam animi sit. Voluptates voluptatem nulla incidunt minima. Rerum amet eveniet unde ut."
                }, {
                    "name": "Jessyca Monahan",
                    "content": "Laudantium eos eius nemo quia. Et explicabo corporis odit laboriosam. Eius totam maiores eum amet et."
                }, {
                    "name": "Lavern Jenkins",
                    "content": "Distinctio eligendi qui et et quia delectus et. A in unde corrupti maxime sit fuga. Eius cumque qui esse occaecati minus ducimus sunt ipsam."
                }, {
                    "name": "Trinity Adams III",
                    "content": "Dicta ipsa eum et. Consequatur voluptate quod et ut quod provident. Voluptatem quae consectetur vel et doloribus dolor."
                }, {
                    "name": "Dahlia Brekke",
                    "content": "Est dolor laborum necessitatibus aliquid magni. Fuga voluptatem totam quo ab porro nobis."
                }, {
                    "name": "Mckenna Stamm",
                    "content": "Blanditiis ipsam consectetur quam nam. Ducimus distinctio impedit maiores nesciunt. Dolor assumenda est voluptates ullam hic asperiores. Dolorem et veritatis quia omnis."
                }, {
                    "name": "Prof. Randall Torphy II",
                    "content": "Odio sapiente eum commodi eligendi. Eius nulla nemo quaerat cupiditate facere consequatur repellat. Qui et consequuntur quis aut aut. Sunt quis molestias rerum commodi iure."
                }, {
                    "name": "Dr. Samson Barton MD",
                    "content": "Eos tempora iusto enim neque ducimus. Maiores sunt voluptatem corrupti. Autem et sunt dicta itaque pariatur ducimus dolorum labore. Hic perspiciatis quasi aliquid sint quam in repellat."
                }, {
                    "name": "Lyla Kerluke DDS",
                    "content": "Ipsa vel quibusdam modi qui asperiores. Ipsum aut harum occaecati qui repellat et. Reiciendis recusandae rerum ut dolorem facere accusamus et ad. Saepe voluptatem ut quo."
                }, {
                    "name": "Deondre Krajcik",
                    "content": "Vel provident assumenda et quasi rerum. Excepturi dolor beatae consequuntur illo qui. Atque repudiandae voluptate vel corrupti nostrum in. Non aut eum exercitationem delectus."
                }, {
                    "name": "Ken Anderson",
                    "content": "In nisi expedita magnam provident sint voluptatem rerum. Totam est aut voluptatem modi. Natus fuga molestiae in voluptatem. Qui qui culpa voluptatum consequatur dolor quo."
                }, {
                    "name": "Tania Nitzsche",
                    "content": "Et in est beatae facere ipsam optio magnam. Voluptatem ab voluptas est rerum perferendis aut. Non nesciunt rerum voluptatum quia sapiente blanditiis alias officiis. Ab a possimus sint eligendi."
                }, {
                    "name": "Kelsie Smith IV",
                    "content": "Id dolores ex eius quam. Eos incidunt eaque quo voluptatibus culpa eaque doloribus earum. Et maiores iure ipsum accusamus enim."
                }, {
                    "name": "Assunta Doyle",
                    "content": "Dolores et esse ea esse aut illum. Dolores aspernatur iure a eos cum provident sapiente voluptatem. A reiciendis eos sunt tempore nesciunt possimus doloremque."
                }, {
                    "name": "Maynard Murphy PhD",
                    "content": "Voluptas veniam quos architecto sit voluptate laboriosam sequi. Quidem quis ut distinctio voluptatem. Aut modi praesentium eius totam. Mollitia officiis sit dolor."
                }, {
                    "name": "Fredrick Jacobs",
                    "content": "Sunt laudantium aut molestiae quis. Quidem ut debitis enim nobis. Quos exercitationem recusandae est alias nihil. Quia quae dolorem ut vel eum ipsa."
                }, {
                    "name": "Prof. Cyrus Kemmer",
                    "content": "Modi tempore quas quia quibusdam. A veritatis consectetur aut itaque adipisci expedita porro. Consectetur dolores sint consequatur delectus. Eligendi aliquam ratione nulla est assumenda."
                }, {
                    "name": "Keaton Vandervort",
                    "content": "Id placeat delectus adipisci delectus vel dolorem adipisci. Possimus veritatis vero et dolorum reiciendis soluta. Aut numquam voluptatem sint maiores. Magni sed nesciunt illum delectus."
                }, {
                    "name": "Elbert Kuhlman",
                    "content": "Perferendis eligendi nulla rerum ratione et provident et. Modi odit dolor quidem impedit in consequatur. Doloremque quas culpa consectetur consequatur ut iure laudantium."
                }, {
                    "name": "Dr. Angel Casper",
                    "content": "Fuga vero sit voluptates animi nisi. Odit et libero aliquam. Laborum voluptate sit sapiente qui. Necessitatibus et officia iure neque qui. Aut quibusdam magni et aut."
                }, {
                    "name": "Jasmin Champlin",
                    "content": "Natus in totam unde pariatur repellendus. Nulla odio soluta neque. Nobis quod cumque est impedit nihil. Sit dolorum iste unde numquam."
                }, {
                    "name": "Prof. Lauryn Schumm Jr.",
                    "content": "Nam quo temporibus et vero ex a ut similique. Et doloribus voluptatem eveniet dolorem enim voluptatem. Ut odit placeat sit doloribus consequatur ea iure facilis."
                }, {
                    "name": "Marlon Kuhic MD",
                    "content": "Voluptate iusto ratione at voluptas et asperiores voluptatem. Voluptatibus quibusdam blanditiis aut nobis quis minus officia. Ipsam quibusdam sed ipsa quos ipsa eaque."
                }, {
                    "name": "Anabel Rippin",
                    "content": "Et quasi dolorem aut sapiente voluptatibus repellat ut. Optio odit consequuntur deserunt assumenda aperiam. Iusto voluptate magni quia enim quaerat. Consequatur nostrum laudantium hic veritatis iure."
                }, {
                    "name": "Felipe Hirthe",
                    "content": "Illo ea aut vitae vero autem aut. Officia maxime voluptatem nulla. Impedit in dolores assumenda adipisci aut voluptatum. Ipsum vel unde et omnis sed. Est consequuntur rerum non cumque."
                }, {
                    "name": "Fabian Wintheiser V",
                    "content": "Architecto sit praesentium incidunt quo quis. Tempora harum atque enim fugit distinctio. Molestiae in quis repellat alias eos."
                }, {
                    "name": "Miss Rae Pfeffer III",
                    "content": "Iste quisquam omnis repudiandae fugit. Voluptatem cumque quam vel libero. Laboriosam neque et sed et quibusdam labore. Ut reprehenderit commodi quae et."
                }, {
                    "name": "Dr. Abby Beatty",
                    "content": "Et qui voluptatem aut quas. Itaque est totam at modi enim odit. Nulla ullam reprehenderit eum et quia tenetur optio."
                }, {
                    "name": "Lester Schmitt I",
                    "content": "Maiores optio omnis necessitatibus similique ad vero omnis repellat. Et id doloribus sit qui. Eius ratione sunt voluptatem dicta."
                }, {
                    "name": "Miss Sunny Green",
                    "content": "Officia sunt harum aut est doloremque fugiat. Porro voluptas et harum reiciendis officia. Ut aliquam expedita et debitis quas sed reiciendis et."
                }, {
                    "name": "Adelia Wisoky PhD",
                    "content": "Qui corrupti qui cumque quia. Ut voluptatum possimus omnis molestiae voluptatem. Quidem quasi est culpa."
                }, {
                    "name": "Grayson Shields",
                    "content": "Architecto doloremque fuga facilis dolores. Sint assumenda praesentium vitae dolores deleniti est. Ea libero hic quo veniam reiciendis quis. Nam reiciendis similique dolores iure facilis ut."
                }, {
                    "name": "Prof. Isabelle Monahan",
                    "content": "Corporis aspernatur voluptatem voluptatibus nemo sed dolorem quasi. Esse cum non provident atque. Perferendis rerum dolor sed ut possimus deleniti asperiores."
                }, {
                    "name": "Miss Hildegard Kris I",
                    "content": "Voluptatum nesciunt eius ut. Non dicta eligendi animi voluptatem. Laudantium modi et exercitationem quas. Est sint omnis voluptate nemo."
                }, {
                    "name": "Dorthy Yost",
                    "content": "Beatae dolores quaerat iste voluptatem hic consequatur. Sunt et aliquid voluptates molestiae. Quasi corporis sed est doloremque."
                }, {
                    "name": "Ansel Ruecker",
                    "content": "Rem fugiat veritatis odio soluta perspiciatis. Assumenda minus et voluptatibus nihil nulla. Rerum iste expedita pariatur explicabo. Unde dolore in eligendi dolorem ut."
                }, {
                    "name": "Porter Carter",
                    "content": "Ut nobis aut ut alias in. Qui et pariatur enim iusto quos. Deleniti consequuntur sed nobis est fuga sit. Non et voluptatem illum sequi minima sint alias."
                }, {
                    "name": "Izabella Beier IV",
                    "content": "Dolores perspiciatis possimus vel voluptatem est. Aliquam possimus aut dolorum voluptas. Quis ea voluptas dolor blanditiis laudantium eum. Consequatur voluptas aut quis eum nihil ab."
                }, {
                    "name": "Prof. Walker Heaney DDS",
                    "content": "Molestiae pariatur consequuntur fugiat ea exercitationem qui. Et dolor beatae voluptas vitae illo cupiditate. Recusandae architecto eius cumque necessitatibus."
                }, {
                    "name": "Berenice Towne",
                    "content": "Officia sint qui autem. Nisi quibusdam aut commodi consectetur consequatur id sunt. Consequatur laboriosam adipisci voluptatem accusamus neque. Dolorum voluptas illum soluta et."
                }, {
                    "name": "Conner Hickle",
                    "content": "Doloribus non sequi ut. Eaque nesciunt molestiae odio possimus quam qui. Tempore facere non omnis aliquid. Nobis soluta alias et rerum."
                }, {
                    "name": "Kyleigh O'Reilly",
                    "content": "Voluptate natus cupiditate quia eaque minima. Non debitis et qui illum asperiores aut. Tempora velit vitae inventore. Et omnis error atque."
                }, {
                    "name": "Oscar Grady",
                    "content": "Dicta vel quia sequi illum. Veniam modi iusto est dolores sed. Rerum et iusto sequi provident."
                }, {
                    "name": "Raymundo Johnston",
                    "content": "Consequuntur praesentium omnis reiciendis amet et at. Recusandae minus aspernatur aut laborum. Ut sit amet eligendi aperiam."
                }],
            get filterSearchs() {
                if (this.search)
                    return this.searchs.filter(i => i.name.startsWith(this.search));
            },
            get noResults() {
                return this.search && !this.filterSearchs.length;
            }
        }));
        Alpine.data('globals', () => ({
            init() {
                window.addEventListener('scroll',
                    () => {
                        this.scrollToTop = document.documentElement.scrollTop
                    })
            },
            scrollToTop: document.documentElement.scrollTop,
            get isShowBackToTop() {
                return this.scrollToTop > 20;
            },
            backToTop() {
                console.log('oki');
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        }));
        Alpine.data('dropdown', () => ({
            open: false,
            trigger: {
                ['@click']() {
                    this.open = !this.open;
                }
            },
            dialog: {
                ['x-show']() {
                    return this.open;
                }

            }
        }))

    });

</script>

{{-- PDF JS --}}

<script>
    const container = document.getElementById('pdfContainer');
    const pdfUrl = '{{ asset($pdf_path) }}';
    let currentPage = 1;

    // View pdf
    function renderPage(page, canvas) {
        const viewport = page.getViewport({ scale: 1 });
        const canvasContext = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        page.render({ canvasContext, viewport });
    }

    // Get pdf from prdUrl
    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
        function loadPage() {
            pdf.getPage(currentPage).then(function (page) {

                // New div
                const newDiv = document.createElement('div');
                newDiv.classList.add('bg-white', 'rounded-2lg', 'lg:px-28', 'px-8', 'py-14', 'mt-4');

                // New canvas
                const newCanvas = document.createElement('canvas');
                newCanvas.classList.add('w-full');

                // Add div to pdfContainer
                newDiv.appendChild(newCanvas);
                container.appendChild(newDiv);

                // Render pdf in new page
                renderPage(page, newCanvas);

                if (currentPage < pdf.numPages) {
                    currentPage++;
                    document.getElementById('loadMoreButton').style.display = 'block';
                } else {
                    document.getElementById('loadMoreButton').style.display = 'none';
                }
            });
        }

        document.getElementById('loadMoreButton').addEventListener('click', function () {
            loadPage();
        });

        loadPage();
    });
</script>

{{-- Style --}}
<script>

    const menu_icon = document.getElementById('menu_icon');
    const modal_menu = document.getElementById('modal_menu');
    const modal_menu_content = document.getElementById('modal_menu_content');
    menu_icon.addEventListener('click', function (e) {
        modal_menu.classList.remove('invisible');
        modal_menu.classList.add('visible');
        modal_menu_content.classList.remove('-translate-x-full')

        modal_menu_content.classList.add('translate-0')

    });
    document.addEventListener('click', function (e) {
        if (!e.target.closest('#modal_menu_content') && e.target !== menu_icon || e.target.id === "modal_menu_icon") {
            modal_menu.classList.remove('visible');
            modal_menu.classList.add('invisible');
            modal_menu_content.classList.remove('translate-0')
            modal_menu_content.classList.add('-translate-x-full')
        };
    });
    const list_library_items = document.querySelectorAll('.drop-down');
    for (const listLibraryItem of list_library_items) {
        listLibraryItem.addEventListener('click', function (e) {
            if (!listLibraryItem.classList.contains('active')) {
                delete_class_if_exists(list_library_items, ['bg-[#80D3C3]', 'active']);
                listLibraryItem.classList.toggle('bg-[#80D3C3]');
                listLibraryItem.classList.toggle('active');
            }
            else {
                delete_class_if_exists(list_library_items, ['bg-[#80D3C3]', 'active']);
            }

        })
    }

    function delete_class_if_exists(items, name_class) {
        for (const item of items) {
            if (Array.isArray(name_class)) {
                for (const name of name_class) {
                    item.classList.remove(name)
                }
            }
        }
    }
    function closeModal() {
        modal_menu.classList.remove('visible');
        modal_menu.classList.add('invisible');
        modal_menu_content.classList.remove('translate-0')
        modal_menu_content.classList.add('-translate-x-full')
    }


    // Xu ly report
    const reportRadios = document.querySelectorAll('input[name="report_radio"]');
    const reportOtherInput = document.getElementById('report_other_input');
    // Bắt sự kiện khi radio button thay đổi
    reportRadios.forEach(function (radioButton) {
        radioButton.addEventListener('change', function () {
            if (radioButton.checked && radioButton.id === 'report_radio_other') {
                reportOtherInput.classList.remove('hidden');
            } else {
                reportOtherInput.classList.add('hidden');
            }
        });
    });

    // Xu ly document share
    const inputField = document.getElementById('document_share');
    const message = document.getElementById('document_share_message');

    inputField.addEventListener('click', async e => {

        // const text = event.target.innerText
        await navigator.clipboard.writeText(inputField.value);  // nã text vô clipboard
        message.textContent = 'Copied!!' // thêm tí thông báo copy thành công

        inputField.addEventListener('click', async e => {
            if (!navigator.clipboard) return // méo có clipboard, abort!

            try {
                await navigator.clipboard.writeText(inputField.value);
                message.textContent = 'Copied to clipboard'
            } catch (error) {
                console.error('Failed to copy!', error)
                // handle error ở đây nếu có gì sai sai, thường chỉ xảy ra khi copy cái gì đó lớn vô clipboard
            }
        })
    })



    // modal report
    function showModalReport(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
        modal.classList.add('fixed');
        modal.classList.add('translate-y-full');
        setTimeout(function() {
            modal.classList.remove('translate-y-full');
        }, 0);
    }

    function hideModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('translate-y-full');
        setTimeout(function() {
            modal.classList.add('hidden');
            modal.classList.remove('fixed');
            modal.classList.remove('translate-y-full');
        }, 500);
    }

    // Xử lý sự kiện khi click vào nút đóng modal
    const closeButtons = document.querySelectorAll('[data-modal-hide]');
    closeButtons.forEach(function(button) {
        const targetModalId = button.getAttribute('data-modal-hide');
        button.addEventListener('click', function() {
            hideModal(targetModalId);
        });
    });

</script>
</body>
</html>
