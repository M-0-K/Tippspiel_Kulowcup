# ==============================
# Tippspiel Apache Setup Script
# ==============================

$ErrorActionPreference = "Stop"

# ---- Konfiguration ----
$XamppRoot = "C:\git\github\xampp"
$ApacheConfExtra = Join-Path $XamppRoot "apache\conf\extra"
$VHostsDir = Join-Path $ApacheConfExtra "vhosts.d"
$HttpdVhosts = Join-Path $ApacheConfExtra "httpd-vhosts.conf"

$ProjectName = "Tippspiel_Kulowcup"
$ProjectRoot = Join-Path $XamppRoot "htdocs\$ProjectName"
$SourceConf = Join-Path $PSScriptRoot "apache\tippspiel.local.conf"
$TargetConf = Join-Path $VHostsDir "tippspiel.local.conf"

Write-Host "Starting Tippspiel Apache setup..."

# ---- Checks ----
if (!(Test-Path $XamppRoot)) { throw "XAMPP not found at $XamppRoot" }
if (!(Test-Path $ProjectRoot)) { throw "Project folder not found: $ProjectRoot" }
if (!(Test-Path $SourceConf)) { throw "Source config missing: $SourceConf" }
if (!(Test-Path $HttpdVhosts)) { throw "httpd-vhosts.conf not found: $HttpdVhosts" }

# ---- vhosts.d anlegen ----
if (!(Test-Path $VHostsDir)) {
    Write-Host "Creating vhosts.d directory: $VHostsDir"
    New-Item -ItemType Directory -Path $VHostsDir | Out-Null
}

# ---- IncludeOptional sicherstellen ----
$includeLine = 'IncludeOptional conf/extra/vhosts.d/*.conf'

$vhostsText = Get-Content -Path $HttpdVhosts -Raw

if ($vhostsText -notlike "*$includeLine*") {
    Write-Host "Adding IncludeOptional to httpd-vhosts.conf"
    Add-Content -Path $HttpdVhosts -Value "`r`n$includeLine`r`n"
} else {
    Write-Host "IncludeOptional already present"
}

# ---- Config kopieren (ersetzen) ----
Write-Host "Copying tippspiel.local.conf to: $TargetConf"
Copy-Item -Path $SourceConf -Destination $TargetConf -Force

Write-Host ""
Write-Host "Setup completed successfully."
Write-Host "Please restart Apache."
Write-Host "Open: http://localhost/"
Write-Host "If is not working, please restart the server and check httpd.conf for uncommented vhost includes."
