<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch: Aplicación Móvil Educativa</title>
    <style>
        body {
            font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .header {
            text-align: center;
            background: white;
            padding: 60px 40px;
            border: 4px solid #333;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .header-content {
            position: relative;
            z-index: 1;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: 4px solid #333;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .logo svg {
            width: 40px;
            height: 40px;
            fill: white;
        }
        
        h1 {
            font-size: 3.5rem;
            font-weight: 900;
            margin: 0 0 20px 0;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .subtitle {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 30px;
        }
        
        .section {
            background: white;
            padding: 40px;
            margin-bottom: 30px;
            border: 4px solid #333;
            position: relative;
            transition: transform 0.3s ease;
        }
        
        .section:hover {
            transform: translateY(-5px);
            box-shadow: 10px 10px 0px rgba(0,0,0,0.1);
        }
        
        .section h2 {
            font-size: 2.2rem;
            color: #333;
            margin-bottom: 25px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .stat-card {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 30px;
            text-align: center;
            border: 3px solid #333;
            position: relative;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            display: block;
            margin-bottom: 10px;
        }
        
        .benefits-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }
        
        .benefit-item {
            background: #f8f9ff;
            padding: 25px;
            border: 2px solid #667eea;
            border-left: 8px solid #667eea;
        }
        
        .benefit-item h4 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 15px;
        }
        
        .highlight {
            background: linear-gradient(120deg, #a8edea 0%, #fed6e3 100%);
            padding: 30px;
            border: 3px solid #333;
            margin: 30px 0;
            text-align: center;
        }
        
        .highlight h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #333;
        }
        
        .cta-section {
            background: linear-gradient(45deg, #333, #555);
            color: white;
            padding: 50px;
            text-align: center;
            border: 4px solid #333;
            margin-top: 40px;
        }
        
        .cta-button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 20px 40px;
            text-decoration: none;
            font-weight: 900;
            font-size: 1.2rem;
            border: 3px solid white;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }
        
        .cta-button:hover {
            background: white;
            color: #667eea;
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            h1 { font-size: 2.5rem; }
            .subtitle { font-size: 1.2rem; }
            .section { padding: 25px; }
            .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <div class="logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h1>EduGamer App - Rubicon</h1>
                <p class="subtitle">Portabilizando el Aprendizaje a través de Videojuegos Móviles</p>
                <p><strong>Medellín, Colombia</strong></p>
            </div>
        </header>

        <section class="section">
            <h2>🎯 El Mercado de los Videojuegos</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">$200B</span>
                    <p>Ingresos proyectados para 2026</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">3.2B</span>
                    <p>Jugadores activos mundialmente</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">230M</span>
                    <p>Usuarios activos mensuales (Fortnite)</p>
                </div>
            </div>
            <p><strong>Los videojuegos ya dominan el entretenimiento audiovisual, superando a la música y el cine combinados.</strong> Nuestra aplicación aprovecha esta tendencia masiva para revolucionar la educación.</p>
        </section>

        <section class="section">
            <h2>🧠 Game-Based Learning: La Ciencia Detrás del Éxito</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <h4>🚀 Dinamiza la Educación</h4>
                    <p>Transforma el aprendizaje en experiencias divertidas y emocionantes, permitiendo que los estudiantes asimilen contenidos de forma natural.</p>
                </div>
                <div class="benefit-item">
                    <h4>⭐ Incrementa la Motivación</h4>
                    <p>Los estudiantes se convierten en protagonistas, recibiendo recompensas por su esfuerzo: medallas, logros y progreso visible.</p>
                </div>
                <div class="benefit-item">
                    <h4>🎮 Facilita la Práctica</h4>
                    <p>Permite aplicar conocimientos en entornos seguros, sin riesgos reales, maximizando el aprendizaje experiencial.</p>
                </div>
            </div>
        </section>

        <div class="highlight">
            <h3>💡 Respaldo Científico</h3>
            <p><strong>Universidad de Oxford (2014):</strong> Los niños que juegan videojuegos con moderación (menos de 1 hora diaria) muestran mayor estabilidad emocional y mejores habilidades sociales que aquellos que no juegan.</p>
        </div>

        <section class="section">
            <h2>🎓 Beneficios Comprobados de Nuestra App</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <h4>🧩 Desarrollo Cognitivo</h4>
                    <p><strong>Atención, memoria y creatividad:</strong> Mejora significativa en capacidades cognitivas fundamentales para el aprendizaje académico.</p>
                </div>
                <div class="benefit-item">
                    <h4>🌍 Aprendizaje Multidisciplinario</h4>
                    <p><strong>Historia, geografía, matemáticas:</strong> Contenido educativo integrado de forma natural en experiencias de juego envolventes.</p>
                </div>
                <div class="benefit-item">
                    <h4>🤝 Habilidades Sociales</h4>
                    <p><strong>Trabajo en equipo y idiomas:</strong> Desarrollo de competencias interpersonales y comunicativas esenciales para el siglo XXI.</p>
                </div>
                <div class="benefit-item">
                    <h4>🎯 Orientación Vocacional</h4>
                    <p><strong>Despertar vocaciones tempranas:</strong> Como Lara Croft inspira arqueólogos, nuestros juegos revelan pasiones profesionales.</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2>📱 Nuestra Propuesta de Valor</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">100%</span>
                    <p>Móvil y Accesible</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">0</span>
                    <p>Clases Aburridas</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">∞</span>
                    <p>Potencial de Aprendizaje</p>
                </div>
            </div>
            <p><strong>Combinamos la adicción positiva de los videojuegos con contenido educativo de calidad,</strong> creando una experiencia que los estudiantes aman y los padres aprueban.</p>
            
            <div class="highlight" style="margin-top: 30px;">
                <h3>💼 Ventajas Técnicas y Comerciales</h3>
                <div class="benefits-list" style="text-align: left;">
                    <div class="benefit-item">
                        <h4>🏪 Distribución Comercial</h4>
                        <p><strong>Google Play & App Store:</strong> Gracias a la licencia de NativePHP, podemos distribuir comercialmente en ambas tiendas principales, alcanzando el 99% del mercado móvil global.</p>
                    </div>
                    <div class="benefit-item">
                        <h4>💰 Infraestructura Económica</h4>
                        <p><strong>Raspberry Pi 5:</strong> Almacenamiento de datos en hardware propio, reduciendo costos de servidores cloud en un 80% comparado con soluciones tradicionales.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="highlight">
            <h3>🏆 El Momento es AHORA</h3>
            <p>La industria de videojuegos crece exponencialmente. La educación necesita innovación urgente. <strong>Nuestra app está en la intersección perfecta de estas dos mega-tendencias.</strong></p>
        </div>

        <div class="cta-section">
            <h2>🚀 Únete a la Revolución Educativa</h2>
            <p style="font-size: 1.3rem; margin: 30px 0;">No es solo una app. Es el futuro de cómo aprenderán las próximas generaciones.</p>
            
            <div style="background: rgba(255,255,255,0.1); padding: 30px; margin: 30px 0; border: 2px solid white;">
                <h3 style="color: #fff; margin-bottom: 20px;">💡 Objetivos de Financiamiento</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; text-align: left;">
                    <div>
                        <h4 style="color: #a8edea; margin-bottom: 10px;">🔧 Renovación Tecnológica</h4>
                        <p>Licencia anual KaplayJS (Marzo 2026): <strong>$1,000,000 COP</strong></p>
                    </div>
                    <div>
                        <h4 style="color: #fed6e3; margin-bottom: 10px;">⚡ Escalabilidad</h4>
                        <p>Expansión con 2 Raspberry Pi 5 adicionales para un escalamiento horizontal de la infraestructura del emprendimiento</p>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin: 30px 0; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <img src="https://m.media-amazon.com/images/I/81JK0Tghg+L._AC_UF894,1000_QL80_.jpg" 
                    alt="Raspberry Pi 5" 
                    style="max-width: 300px; width: 100%; height: auto; border: 3px solid white; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <p style="color: #a8edea; margin-top: 15px; font-size: 1.1rem;"><strong>Raspberry Pi 5</strong> - Infraestructura de bajo costo, alto rendimiento</p>
            </div>
        </div>
    </div>
</body>
</html>