<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three.js Booth Example</title>
    <style>
        body {
            margin: 0;
        }

        canvas {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Tambahkan Three.js dan OrbitControls dari CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r132/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>

    <script>
        // Inisialisasi scene, camera, dan renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            antialias: true
        });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Orbit controls untuk navigasi
        const controls = new THREE.OrbitControls(camera, renderer.domElement);

        // Tambahkan pencahayaan
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(5, 10, 7.5);
        scene.add(directionalLight);

        // Fungsi untuk membuat booth sesuai dengan contoh
        function createBooth() {
            // Buat lantai
            const floorGeometry = new THREE.PlaneGeometry(20, 10);
            const floorMaterial = new THREE.MeshStandardMaterial({
                color: 0xffffff
            });
            const floor = new THREE.Mesh(floorGeometry, floorMaterial);
            floor.rotation.x = -Math.PI / 2; // Rotate to horizontal
            scene.add(floor);

            // Buat dinding belakang
            const backWallGeometry = new THREE.BoxGeometry(20, 10, 0.1);
            const wallMaterial = new THREE.MeshStandardMaterial({
                color: 0xe0e0e0
            });
            const backWall = new THREE.Mesh(backWallGeometry, wallMaterial);
            backWall.position.set(0, 5, -5);
            scene.add(backWall);

            // Buat dinding samping kiri dan kanan
            const sideWallGeometry = new THREE.BoxGeometry(10, 10, 0.1);
            const sideWallMaterial = new THREE.MeshStandardMaterial({
                color: 0xd3d3d3
            });
            const leftWall = new THREE.Mesh(sideWallGeometry, sideWallMaterial);
            leftWall.rotation.y = Math.PI / 2;
            leftWall.position.set(-10, 5, 0);
            scene.add(leftWall);

            const rightWall = leftWall.clone();
            rightWall.position.set(10, 5, 0);
            scene.add(rightWall);

            // Buat overhead banner
            const bannerGeometry = new THREE.BoxGeometry(20, 2, 0.3);
            const bannerMaterial = new THREE.MeshStandardMaterial({
                color: 0x3e3e3e
            });
            const banner = new THREE.Mesh(bannerGeometry, bannerMaterial);
            banner.position.set(0, 10.5, -5);
            scene.add(banner);
        }

        // Fungsi untuk membuat meja di booth
        function createTable() {
            const tableGeometry = new THREE.BoxGeometry(4, 1, 2);
            const tableMaterial = new THREE.MeshStandardMaterial({
                color: 0x8b8b8b
            });
            const table = new THREE.Mesh(tableGeometry, tableMaterial);
            table.position.set(-7, 0.5, -3);
            scene.add(table);
        }

        // Fungsi untuk membuat kursi
        function createChairs() {
            const seatGeometry = new THREE.CylinderGeometry(0.5, 0.5, 1, 32);
            const seatMaterial = new THREE.MeshStandardMaterial({
                color: 0xffffff
            });

            // Kursi pertama
            const chair1 = new THREE.Mesh(seatGeometry, seatMaterial);
            chair1.position.set(-5, 0.5, -2);
            scene.add(chair1);

            // Kursi kedua
            const chair2 = chair1.clone();
            chair2.position.set(-5, 0.5, -4);
            scene.add(chair2);
        }

        // Fungsi untuk membuat TV di booth
        function createTV() {
            const tvGeometry = new THREE.PlaneGeometry(4, 2.5);
            const tvMaterial = new THREE.MeshStandardMaterial({
                color: 0x000000
            });
            const tv = new THREE.Mesh(tvGeometry, tvMaterial);
            tv.position.set(0, 6, -4.9); // Tempelkan di dinding belakang
            scene.add(tv);
        }

        // Fungsi untuk menambahkan stiker/logo pada banner
        function addBannerText() {
            const loader = new THREE.TextureLoader();
            loader.load('path/to/your/banner-texture.png', function(texture) {
                const bannerGeometry = new THREE.PlaneGeometry(10, 2);
                const bannerMaterial = new THREE.MeshBasicMaterial({
                    map: texture,
                    transparent: true
                });
                const bannerText = new THREE.Mesh(bannerGeometry, bannerMaterial);
                bannerText.position.set(0, 10.5, -5.1); // Tempelkan di depan banner
                scene.add(bannerText);
            });
        }

        // Panggil fungsi untuk membuat booth dan item di dalamnya
        createBooth();
        createTable();
        createChairs();
        createTV();
        addBannerText();

        // Posisi awal kamera
        camera.position.set(0, 10, 20);
        camera.lookAt(0, 5, 0);

        // Fungsi animasi
        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        animate();

        // Resize handler
        window.addEventListener('resize', function() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
</body>

</html>
