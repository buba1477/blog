
<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
            <ul class="nav nav-pills nav-sidebar flex-column pt-4" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('main.index')}}" class="nav-link">
                        <i class=" nav-icon fas fa-home"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.likes.index')}}" class="nav-link">
                        <i class=" nav-icon fas fa-comment"></i>
                        <p>
                            Понравившиеся посты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.comment.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar -->
    </aside>
