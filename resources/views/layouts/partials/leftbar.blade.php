<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

      <ul class="widget widget-menu unstyled">
          <li>
              <a href="{{ URL::route('home')}}">
                  <i class="menu-icon icon-home" style="color: white;"></i>Home
              </a>
          </li>
          <li>
              <a href="{{ URL::route('students-waiting')}}">
                  <i class="menu-icon icon-filter" style="color: white;"></i> All Waiting Students
              </a>
          </li>
          <li>
              <a href="{{ URL::route('students-approved')}}">
                  <i class="menu-icon icon-group" style="color: white;"></i>All approved Students
              </a>
          </li>
          <li>
              <a href="{{ URL::route('books')}}" >
                  <i class="menu-icon icon-th-list" style="color: white;"></i>All Books in Library
              </a>
          </li>
          <li>
              <a href="{{ URL::route('category-new')}}">
                  <i class="menu-icon icon-folder-open-alt" style="color: white;"></i>Add Book Category
              </a>
          </li>
          <li>
              <a href="{{ URL::route('book-new')}}">
                  <i class="menu-icon icon-folder-open-alt" style="color: white;"></i>Add Books
              </a>
          </li>
          <li>
              <a >
                  <i class="menu-icon icon-cog" style="color: white;"></i>Add Settings
              </a>
          </li>

          <li>
              <a >
                  <i class="menu-icon icon-signout" style="color: white;"></i>Issue / Return Books
              </a>
          </li>
          <li>
              <a >
                  <i class="menu-icon icon-list-ul" style="color: white;"></i>View all currently issued books
              </a>
          </li>
      </ul>

      <ul class="widget widget-menu unstyled">
          <li><a href="{{ URL::route('log-out-post') }}"><i class="menu-icon icon-wrench" style="color: white;"></i>Logout </a></li>
      </ul>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>
</div>
<script>

function openNav()
{
  let element = document.getElementById("mySidebar");
  let width = element.style.width;
  if(width == '' || width == '0px')
  {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
 }
 else
 {
  closeNav()
 }
}

function closeNav()
{
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
</script>
