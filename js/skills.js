const skillsContainer = document.querySelector(".skills_container");

export async function createSkillsInnerHTML(theme) {
    try {
        const res = await fetch("http://localhost/portFolio/db/getSkills.php");
        const skills = await res.json();

        let skillsHtml = "";
        skills.forEach((skill) => {
            const imgSrc = theme === "dark" ? skill.src_dark : skill.src_light;
            skillsHtml += `
                <div class="skill">
                    <img src="${imgSrc}" alt="${skill.label}">
                    <p>${skill.label}</p>
                </div>`;
        });

        skillsContainer.innerHTML = skillsHtml;
    } catch (err) {
        console.error("Error fetching skills:", err);
    }
}
