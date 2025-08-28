const container = document.querySelector(".p_c");

async function fetchProjects() {
    try {
        const res = await fetch(
            "http://localhost/portFolio/db/getProjects.php"
        );
        const projects = await res.json();

        let projectHTML = "";
        projects.forEach((project) => {
            projectHTML += `
                <div class="p">
                    <div>
                        <img src="${project.img}" alt="">
                    </div>
                    <div>
                        <h2 class="p_title">${project.title}</h2>
                        <p class="p_desc">${project.description}</p>
                    </div>
                    <div class="p_container">
                        <a href="${project.github}" target="_blank" class="p_link">
                            <img src="./assets/icons/github-light.svg" alt="" class="p_icon">
                            <p>Github</p>
                        </a>
                        <a href="${project.live}" target="_blank" class="p_link">
                            <img src="./assets/icons/link-light.svg" alt="" class="p_icon">
                            <p>Live</p>
                        </a>
                    </div>
                </div>`;
        });

        container.innerHTML = projectHTML;
    } catch (err) {
        console.error("Error fetching projects:", err);
    }
}

window.addEventListener("DOMContentLoaded", fetchProjects);
