// Inisialisasi scene, camera, dan renderer
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
);
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Buat lantai untuk booth
const floorGeometry = new THREE.PlaneGeometry(20, 20);
const floorMaterial = new THREE.MeshBasicMaterial({
    color: 0xaaaaaa,
    side: THREE.DoubleSide,
});
const floor = new THREE.Mesh(floorGeometry, floorMaterial);
floor.rotation.x = -Math.PI / 2; // Rotate to horizontal position
scene.add(floor);

// Buat dinding belakang untuk booth
const wallGeometry = new THREE.BoxGeometry(20, 10, 0.5);
const wallMaterial = new THREE.MeshBasicMaterial({ color: 0xdddddd });
const backWall = new THREE.Mesh(wallGeometry, wallMaterial);
backWall.position.z = -10;
backWall.position.y = 5;
scene.add(backWall);

// Tambahkan lampu ambient
const ambientLight = new THREE.AmbientLight(0x404040); // Soft white light
scene.add(ambientLight);

// Lampu directional untuk memberikan efek bayangan
const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
directionalLight.position.set(5, 10, 7.5);
scene.add(directionalLight);

// Tambahkan model cube sederhana
const geometry = new THREE.BoxGeometry(2, 2, 2);
const material = new THREE.MeshStandardMaterial({ color: 0x00ff00 });
const cube = new THREE.Mesh(geometry, material);
cube.position.set(0, 1, 0); // Set cube di tengah booth
scene.add(cube);

// Posisi awal camera
camera.position.z = 25;
camera.position.y = 10;
camera.lookAt(0, 0, 0);

// Tambahkan orbit controls untuk navigasi interaktif
const controls = new THREE.OrbitControls(camera, renderer.domElement);

// Fungsi animasi
function animate() {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
}
animate();

// Tambahkan interaksi klik menggunakan Raycaster
const raycaster = new THREE.Raycaster();
const mouse = new THREE.Vector2();

window.addEventListener("click", function (event) {
    // Hitung posisi mouse
    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

    // Update raycaster
    raycaster.setFromCamera(mouse, camera);

    // Periksa apakah cube diklik
    const intersects = raycaster.intersectObjects(scene.children);
    if (intersects.length > 0) {
        const object = intersects[0].object;
        if (object === cube) {
            // Ubah warna cube saat diklik
            object.material.color.set(Math.random() * 0xffffff);
        }
    }
});

// Menyesuaikan ukuran saat window di-resize
window.addEventListener("resize", function () {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});
