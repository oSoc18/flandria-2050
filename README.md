# flandria-2050

Database Agentschap Slim Wonen en Leven.
Link if the website: https://www.openflandria.be

## Getting started

```
1. composer install
2. create .env file based on the .env.example
3. create key: php artisan key:generate
4. php artisan serve
```

### Prerequisites

- PHP version 7.2 or later (Argon2 support)
- MySQL

## Database Conception

-projects (id,title,location,year,creator,created_at,update_at,user_id)<br>

-users (id,name,email,password,remember_token,created_at,update_at)<br>

-project_tag(id,<span>project_id</span>,<span> tag_id</span>)<br>

-tags(id,name,created_at,updated_at)<br>

-galleries(id,name,created_at,updated_at,<span>user_id</span><br>

-gallery_project(id,<span>gallery_id</span>,<span>project_id</span><br>

-images(id,file,credit,copyright,year,created_at,updated_at,<span>project_id</span><br>

-migration(id,migration,batch)<br>

-password_resets(email,token,created_at)<br>


### PHP Laravel

With Laravel, the files are very structured. There are controllers, views, and models for every main table.
In the controllers, there are methods which allow to get data from the database. These controllers can send variable, object and collection to the view. The view can use these data thanks to php in the code. For example:

<h3>Pass data from the controller to the view</h3>

app/Http/Controllers/ProjectController.php
```
//a function which will return all the projects of the database
public function index()
    {
        $projects = Project::all();

        return view('project.index')->with('projects', $projects);
    }
 // the 'project.index' is the index view in the view/project folder   
//in the "->with" we can send the collection of project we retrieve from the database.    

```
And then to get the collection $projects in the view:
ressources/views/project/index.blade.php

```
<body>

@foreach ($projects as $project)

<p> {{$project}} </p>
<!-- and if want a specific column of the project object -->
<p> {{$project->title}} </p>

@endforeach

</body>

```
<h3>Models and relations between tables</h3>

Thanks to Eloquent, Laravel allows the user to create very simple relations between the table to get the data. For example, in our database we have a relation many to many between *projects* and *tags*. A project can have a lot of tags, and tags can be part of several projects. So in the model project model we create a function: 

app/Project.php

```
	public function tags() {
		return $this->belongsToMany('App\Tag');
	}

```
app/Http/Controllers/ProjectController.php

```
$projects = $tag->projects;
//this will allow us to get all the projects which have relation with this tags.

```

<h3>Blade </h3>

Blade allows to use php in a very easy way in the views. For example to display a project we can simply do that:

```
@foreach ($allProjects as $projectL)

        <div class="col-sm-5 col-md-3">
                <div class="thumbnail">
                  
                  <div class="caption">
                    <li>Title: {{$projectL->title}}</li> 
                    <p><li>Location: {{$projectL->location}}</li></p>
                    <p><li>Creator: {{$projectL->creator}}</li></p>
                    <p><li>Year: {{$projectL->year}}</li></p>
                    <p><li>Description: {{$projectL->description}}</li></p>
                    <p><a href="/project/update/{{$projectL->id}}" class="btn btn-primary" ><input type="submit"   value="Update settings" class="btn btn-primary">  </a>
                  </div>
                </div>
              </div>
@endforeach

```

We can also use @if @endif:

```
@if ($projects != null)
    @foreach ($projects as $project)
        {{$project->title}}
    @endforeach
@endif    
```

<h3>Routes</h3>

We have used web route to register our route for the application. It is stored in the file routes/web.php. In this file, we can define which route will call which method of a specified controller. We also have to choose which kind of request we are doing (PUT, GET, DELETE, POST). 
Here is an example:

```
Route::get('/project', 'ProjectController@index');

```
the name of the site + /project will return all the projects of the database because the index method in the ProjectController return that:

```
    public function index()
    {
        $projects = Project::all();

        return view('project.index')->with('projects', $projects);
    }
```
## Our own features and explanation

We have used the authentication which is provided by Laravel, to see more about it go on the official documentation: https://laravel.com/docs/5.6/authentication.

<h3> The search bar </h3>

To create the search bar we have used a simple database search. When the user tap a word in the search bar, the controller goes to the database and then see if there is a tag, project title or a description which matches to the search word. We haven't get the time to develop a more efficient way for the search bar. We have thinked about an elastic search. 

<h3>Gallery</h3>

The gallery is a sort of album in which the user can store the picture he/she saw on the website. The user can also choose in which gallery he/she wants to store these picture. User can create new gallery, delete or change the name of an existing one.

There is a layout which is present in every gallery page. Here you can retrieve this layout: ressources/views/layouts/gallery.blade.php.
There is a page in which user can change the name of the gallery. In the tab of every gallery, user can also modify and delete the gallery.

A gallery belongs to an user, an user can have many gallery. Gallery can have a lot of project, and project can belong to many gallery. 


## Authors and contributors

<h3>Author</h3>
* **Mohanad ABOU ZAIDI**
<h3>Project Contributor</h3>
* **Gwen** <br>
Project Manager -https://github.com/gwenfranck<br>
* **Julija**    <br>        
- Communication -https://github.com/<br>
* **Brysen Ackx**   <br>    
- Fullstack developer-https://github.com/awildbrysen<br>
* **Kevin**        <br>     
- Front-end developer -https://github.com/<br>
* **Smayn**        <br>   
- designer -https://github.com/<br>
* **Mohanad*<br>
- Back-end developer -https://github.com/mohanadabouzaidi
<br>

