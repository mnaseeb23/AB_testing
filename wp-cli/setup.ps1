# ==============================================================================
# Leather Jacket House - Windows PowerShell Setup & Run Helper
# ==============================================================================

Write-Host "==========================================================" -ForegroundColor Cyan
Write-Host " Leather Jacket House - Docker Setup & Launch Helper" -ForegroundColor Cyan
Write-Host "==========================================================" -ForegroundColor Cyan

# 1. Check if .env exists
if (-not (Test-Path ".env")) {
    Write-Host "Copying .env.example to .env..." -ForegroundColor Yellow
    Copy-Item ".env.example" ".env"
}

# 2. Build and start containers
Write-Host "Starting Docker containers..." -ForegroundColor Green
docker compose up -d --build

# 3. Wait for containers
Write-Host "Waiting for services to become healthy..." -ForegroundColor Yellow
Start-Sleep -Seconds 10

# 4. Run automated setup inside container
Write-Host "Running WP-CLI automated configuration..." -ForegroundColor Green
docker compose exec wordpress bash /wp-cli/setup.sh

Write-Host "==========================================================" -ForegroundColor Cyan
Write-Host " Application is Ready!" -ForegroundColor Green
Write-Host " WordPress Store: http://localhost:8080" -ForegroundColor White
Write-Host " Admin Panel:     http://localhost:8080/wp-admin" -ForegroundColor White
Write-Host " Admin Username:  admin" -ForegroundColor White
Write-Host " Admin Password:  AdminPassword2026!" -ForegroundColor White
Write-Host " phpMyAdmin:      http://localhost:8081" -ForegroundColor White
Write-Host "==========================================================" -ForegroundColor Cyan
