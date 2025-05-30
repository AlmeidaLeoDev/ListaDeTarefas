<a id="readme-top"></a>

<div> 
  <a href="https://www.youtube.com/@AlmeidaVerse" target="_blank"><img src="https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white" target="_blank"></a>
  <a href = "mailto:almeidaleo.dev@gmail.com"><img src="https://img.shields.io/badge/-Gmail-%23333?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
  <a href="https://www.linkedin.com/in/almeidaleo-dev/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a> 
</div>

<br />

<!-- PROJECT LOGO -->
<div align="center">
  <a href="https://github.com/AlmeidaLeoDev/ListaDeTarefas">
    <img src="img/myLogo.svg" alt="Logo" width="250" height="250">
  </a>
  <h3 align="center">TO DO LIST</h3>
</div>

  <div align="center">
    A simple task management web application. 
  </div>

  <div align="center">
    <a href="#about-the-project"><strong>Explore the docs »</strong></a>
  </div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li>
      <a href="#contributing">Contributing</a>
      <ul>
        <li><a href="#top-contributors">Top contributors</a></li>
      </ul>
    </li>
  </ol>
</details>


<!-- ABOUT THE PROJECT -->
## About The Project

A simple task management web application built with PHP and styled with CSS. Tasks are managed using PHP sessions, allowing you to add, mark as complete/incomplete, delete individual tasks, or clear the entire list.

Deployed and tested on Amazon EC2.

Main Objectives:

* Develop a lightweight task management app using only PHP, HTML, and CSS
* Practice session-based state management in PHP
* Deploy and test a PHP application on a cloud server (Amazon EC2)
* Provide a clean, responsive interface for managing to-do items

</br>

### Built With

![Static Badge](https://img.shields.io/badge/PHP-white?style=for-the-badge&logo=PHP&logoSize=auto) </br>
[![Static Badge](https://img.shields.io/badge/html-white?style=for-the-badge&logo=html5)](https://developer.mozilla.org/en-US/docs/Web/HTML) </br>
[![Static Badge](https://img.shields.io/badge/css-white?style=for-the-badge&logo=css3&logoColor=%231572B6)](https://developer.mozilla.org/en-US/docs/Web/CSS) </br>
![Static Badge](https://img.shields.io/badge/amazon%20ec2-white?style=for-the-badge&logo=amazon%20ec2&logoSize=auto)


<br />
<p align="left">(<a href="#readme-top">Back to top</a>)</p>
<br />

<!-- GETTING STARTED -->
## Getting Started

Instructions on how you can set up your project locally.

### Prerequisites

* Git: To clone the repository.
* PHP >= 7.4 or 8.x – Required to run the application.
* Web Server (Apache) – To serve the application.
* Amazon EC2 Instance – If deploying to a production environment.


### Installation

Below you will find instructions on how to install and configure your application.

**1. Clone the Repository**

Open your terminal and run:

```bash
git clone https://github.com/AlmeidaLeoDev/ListaDeTarefas
```
Then navigate to the project directory:
```bash
cd ListaDeTarefas
```
<p></p>

**2. Configure**

Set Up Environment Variables:

- Ensure PHP is installed.
- Start a local PHP server.
- Make sure your session storage is enabled.

**3. Run the Application**

Since this is a pure-PHP app, there’s no build step. Just start the built-in PHP server:

```bash
php -S localhost:8000
```

Then open your browser to:

```bash
http://localhost:8000
```
<p></p>

**4. Verify the Setup**

* Add a Task: Type in the form and click "To add".
* Toggle Status: Click the status badge to switch between “Pending” and “Completed”
* Delete Task: Click the "X" icon and confirm deletion.
* Clear All: Use the “Clear all tasks” button and confirm.
* Counters: Check that the Total, Pending, and Completed counters update correctly.

<br />
<p align="left">(<a href="#readme-top">Back to top</a>)</p>
<br />


<!-- USAGE -->
## Usage

Demonstration of how the PHP task-list application can be used.

<div align="left">

**1. Adding a New Task**
  
* On the homepage, type your task into the input field.
* Click the "To add" button.

<img src="img/1.1sitePrint.png" alt="site-add-button" width="800" height="auto">

* The new task appears in the list with a “Pending” badge.

<img src="img/1.2sitePrint.png" alt="new-task" width="800" height="auto">
<p></p>

**2. Toggling Task Status**

* Click on the "Pending" or "Completed" badge next to any task.

<img src="img/2.1sitePrint.png" alt="toggling-task" width="800" height="auto">
<img src="img/2.2sitePrint.png" alt="toggling-task" width="800" height="auto">

<p></p>

**3. Deleting a Task**

* Click the "X" icon on the right of a task.
* Confirm the deletion in the browser dialog. The task is removed from the list.

<img src="img/3.1sitePrint.png" alt="deleting-task" width="800" height="auto">
<img src="img/3.2sitePrint.png" alt="deleting-task" width="800" height="auto">

<p></p>

**4. Clearing All Tasks**

* At the bottom, click "Clear all tasks" (with the trash can icon).
* Confirm in the popup dialog. All tasks are wiped from the session.

<img src="img/4.1sitePrint.png" alt="clearing-task" width="800" height="auto">
<img src="img/4.2sitePrint.png" alt="clearing-task" width="800" height="auto">
<p></p>

**5. Viewing Task Counters**

* Check the counters in the center:
  * Total: total number of tasks
  * Pendings: tasks still pending
  * Completed: tasks already completed

<img src="" alt="" width="800" height="auto">

</div>

<br />
<p align="left">(<a href="#readme-top">Back to top</a>)</p>
<br />


<!-- CONTRIBUTING -->
## Contributing

### Top contributors

<table>
  <tr>
    <td align="center">
      <a href="https://www.linkedin.com/in/almeidaleo-dev/" target="_blank">
        <img src="img/profile.jpg" width="100px;" alt="Leonardo Almeida Profile Picture"/><br>
        <sub>
          <b>Leonardo Almeida</b>
        </sub>
      </a>
    </td>
</table>

<br />
<p align="left">(<a href="#readme-top">Back to top</a>)</p>
<br />
