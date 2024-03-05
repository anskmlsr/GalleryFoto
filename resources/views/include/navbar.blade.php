<nav class="bg-white py-5 items-center max-w-screen-lg mx-auto">
    <div class="flex flex-row justify-between">
        <div class="text-red-600 text-2xl font-bold">
            GalleryFoto
           <a href="/uploadfoto"><span class="bi bi-cloud-arrow-up-fill"></span></a>
        </div>
        <div class="flex flex-row text-red-600 text-2xl">
            <div class="mt-1">
            <form action="/explore" method="GET">
            <input type="text" class=" text-sm text-red-600 px-2 py-0 mr-1 rounded-full border border-red-600" placeholder="search...." name="cari">
        </form>
            </div>
          <div>
            <a href="/explore"><span class="bi bi-house-fill"></span></a>
          </div>
          <div>

          </div>
      <div class="flex items-center">
          <img src="{{asset ('asset/'.auth()->user()->picture)}}" alt="" class="w-8 h-8 rounded-full" data-dropdown-toggle="user-dropdown-menu">
          <!-- Drop Down -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
              id="user-dropdown-menu">
              <ul class="py-2" role="none">
                  <li>
                      <a href="/profile"
                          class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                          role="menuitem">
                          <div class="inline-flex items-center">
                              Profile
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="/changepassword"
                          class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                          role="menuitem">
                          <div class="inline-flex items-center">
                              Change Password
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="/logout"
                          class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                          role="menuitem">
                          <div class="inline-flex items-center">
                              Log Out
                          </div>
                      </a>
                  </li>
              </ul>
          </div>
          <!-- End Navigation -->
      </div>
        </div>
    </div>
</nav>
