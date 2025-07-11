<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.pitch_title') }}</title>
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
                <h1>{{ __('messages.app_name') }}</h1>
                <p class="subtitle">{{ __('messages.app_subtitle') }}</p>
                <p><strong>{{ __('messages.location') }}</strong></p>
            </div>
        </header>

        <section class="section">
            <h2>{{ __('messages.section_1_title') }}</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">$200B</span>
                    <p>{{ __('messages.projected_revenue') }}</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">3.2B</span>
                    <p>{{ __('messages.active_players') }}</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">230M</span>
                    <p>{{ __('messages.monthly_active_users') }}</p>
                </div>
            </div>
            <p><strong>{{ __('messages.market_dominance_text') }}</strong></p>
        </section>

        <section class="section">
            <h2>{{ __('messages.section_2_title') }}</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_1_title') }}</h4>
                    <p>{{ __('messages.benefit_1_description') }}</p>
                </div>
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_2_title') }}</h4>
                    <p>{{ __('messages.benefit_2_description') }}</p>
                </div>
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_3_title') }}</h4>
                    <p>{{ __('messages.benefit_3_description') }}</p>
                </div>
            </div>
        </section>

        <div class="highlight">
            <h3>{{ __('messages.highlight_1_title') }}</h3>
            <p><strong>{{ __('messages.oxford_study_text') }}</strong></p>
        </div>

        <section class="section">
            <h2>{{ __('messages.section_3_title') }}</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_4_title') }}</h4>
                    <p><strong>{{ __('messages.benefit_4_description') }}</strong></p>
                </div>
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_5_title') }}</h4>
                    <p><strong>{{ __('messages.benefit_5_description') }}</strong></p>
                </div>
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_6_title') }}</h4>
                    <p><strong>{{ __('messages.benefit_6_description') }}</strong></p>
                </div>
                <div class="benefit-item">
                    <h4>{{ __('messages.benefit_7_title') }}</h4>
                    <p><strong>{{ __('messages.benefit_7_description') }}</strong></p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2>{{ __('messages.section_4_title') }}</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">100%</span>
                    <p>{{ __('messages.mobile_accessible_percentage') }}</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">0</span>
                    <p>{{ __('messages.boring_classes') }}</p>
                </div>
                <div class="stat-card">
                    <span class="stat-number">∞</span>
                    <p>{{ __('messages.learning_potential') }}</p>
                </div>
            </div>
            <p><strong>{{ __('messages.value_prop_text') }}</strong></p>
            
            <div class="highlight" style="margin-top: 30px;">
                <h3>{{ __('messages.technical_commercial_advantages_title') }}</h3>
                <div class="benefits-list" style="text-align: left;">
                    <div class="benefit-item">
                        <h4>{{ __('messages.commercial_distribution_title') }}</h4>
                        <p><strong>{{ __('messages.commercial_distribution_description') }}</strong></p>
                    </div>
                    <div class="benefit-item">
                        <h4>{{ __('messages.economic_infrastructure_title') }}</h4>
                        <p><strong>{{ __('messages.economic_infrastructure_description') }}</strong></p>
                    </div>
                </div>
            </div>
        </section>

        <div class="highlight">
            <h3>{{ __('messages.highlight_2_title') }}</h3>
            <p><strong>{{ __('messages.now_text') }}</strong></p>
        </div>

    </div>
</body>
</html>