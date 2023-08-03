<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mobile_detect_library
{
    private $mobile_detect;
    public function __construct()
    {
        require_once APPPATH.'third_party/MobileDetect.php';
        $this->mobile_detect = new Mobiledetect;
    }

    function getDeviceType()
    {
        if($this->mobile_detect->istablet())
        {
            $deviceType = "Tablet";
        }
        else if($this->mobile_detect->isMobile())
        {
            $deviceType = "Mobile";
        }
        else
        {
            $deviceType = "Undefined";
        }
        return $deviceType;
    }

    function getDeviceModel()
    {
        if($this->mobile_detect->isiPhone())
        {
            $deviceModel="iPhone";
        }
        else if($this->mobile_detect->isBlackBerry())
        {
            $deviceModel="BlackBerry";
        }
        else if($this->mobile_detect->isHTC())
        {
            $deviceModel="HTC";
        }
        else if($this->mobile_detect->isNexus())
        {
            $deviceModel="Nexus";
        }
        else if($this->mobile_detect->isDell())
        {
            $deviceModel="Dell";
        }
        else if($this->mobile_detect->isMotorola())
        {
            $deviceModel="Motorola";
        }
        else if($this->mobile_detect->isSamsung())
        {
            $deviceModel="Samsung";
        }
        else if($this->mobile_detect->isLG())
        {
            $deviceModel="LG";
        }
        else if($this->mobile_detect->isSony())
        {
            $deviceModel="Sony";
        }
        else if($this->mobile_detect->isAsus())
        {
            $deviceModel="Asus";
        }
        else if($this->mobile_detect->isNokiaLumia())
        {
            $deviceModel="NokiaLumia";
        }
        else if($this->mobile_detect->isMicromax())
        {
            $deviceModel="Micromax";
        }
        else if($this->mobile_detect->isPalm())
        {
            $deviceModel="Palm";
        }
        else if($this->mobile_detect->isVertu())
        {
            $deviceModel="Vertu";
        }
        else if($this->mobile_detect->isPantech())
        {
            $deviceModel="Pantech";
        }
        else if($this->mobile_detect->isFly())
        {
            $deviceModel="Fly";
        }
        else if($this->mobile_detect->isWiko())
        {
            $deviceModel="Wiko";
        }
        else if($this->mobile_detect->isiMobile())
        {
            $deviceModel="iMobile";
        }
        else if($this->mobile_detect->isSimValley())
        {
            $deviceModel="SimValley";
        }
        else if($this->mobile_detect->isWolfgang())
        {
            $deviceModel="Wolfgang";
        }
        else if($this->mobile_detect->isAlcatel())
        {
            $deviceModel="Alcatel";
        }
        else if($this->mobile_detect->isNintendo())
        {
            $deviceModel="Nintendo";
        }
        else if($this->mobile_detect->isAmoi())
        {
            $deviceModel="Amoi";
        }
        else if($this->mobile_detect->isINQ())
        {
            $deviceModel="INQ";
        }
        else if($this->mobile_detect->isGenericPhone())
        {
            $deviceModel="GenericPhone";
        }
        else if($this->mobile_detect->isiPad())
        {
            $deviceModel="iPad";
        }
        else if($this->mobile_detect->isNexusTablet())
        {
            $deviceModel="NexusTablet";
        }
        else if($this->mobile_detect->isSamsungTablet())
        {
            $deviceModel="SamsungTablet";
        }
        else if($this->mobile_detect->isKindle())
        {
            $deviceModel="Kindle";
        }
        else if($this->mobile_detect->isSurfaceTablet())
        {
            $deviceModel="SurfaceTablet";
        }
        else if($this->mobile_detect->isHPTablet())
        {
            $deviceModel="HPTablet";
        }
        else if($this->mobile_detect->isAsusTablet())
        {
            $deviceModel="AsusTablet";
        }
        else if($this->mobile_detect->isBlackBerryTablet())
        {
            $deviceModel="BlackBerryTablet";
        }
        else if($this->mobile_detect->isHTCtablet())
        {
            $deviceModel="HTCtablet";
        }
        else if($this->mobile_detect->isMotorolaTablet())
        {
            $deviceModel="MotorolaTablet";
        }
        else if($this->mobile_detect->isNookTablet())
        {
            $deviceModel="NookTablet";
        }
        else if($this->mobile_detect->isAcerTablet())
        {
            $deviceModel="AcerTablet";
        }
        else if($this->mobile_detect->isToshibaTablet())
        {
            $deviceModel="ToshibaTablet";
        }
        else if($this->mobile_detect->isLGTablet())
        {
            $deviceModel="LGTablet";
        }
        else if($this->mobile_detect->isFujitsuTablet())
        {
            $deviceModel="FujitsuTablet";
        }
        else if($this->mobile_detect->isPrestigioTablet())
        {
            $deviceModel="PrestigioTablet";
        }
        else if($this->mobile_detect->isLenovoTablet())
        {
            $deviceModel="LenovoTablet";
        }
        else if($this->mobile_detect->isDellTablet())
        {
            $deviceModel="DellTablet";
        }
        else if($this->mobile_detect->isYarvikTablet())
        {
            $deviceModel="YarvikTablet";
        }
        else if($this->mobile_detect->isMedionTablet())
        {
            $deviceModel="MedionTablet";
        }
        else if($this->mobile_detect->isArnovaTablet())
        {
            $deviceModel="ArnovaTablet";
        }
        else if($this->mobile_detect->isIntensoTablet())
        {
            $deviceModel="IntensoTablet";
        }
        else if($this->mobile_detect->isIRUTablet())
        {
            $deviceModel="IRUTablet";
        }
        else if($this->mobile_detect->isMegafonTablet())
        {
            $deviceModel="MegafonTablet";
        }
        else if($this->mobile_detect->isEbodaTablet())
        {
            $deviceModel="EbodaTablet";
        }
        else if($this->mobile_detect->isAllViewTablet())
        {
            $deviceModel="AllViewTablet";
        }
        else if($this->mobile_detect->isArchosTablet())
        {
            $deviceModel="ArchosTablet";
        }
        else if($this->mobile_detect->isAinolTablet())
        {
            $deviceModel="AinolTablet";
        }
        else if($this->mobile_detect->isNokiaLumiaTablet())
        {
            $deviceModel="NokiaLumiaTablet";
        }
        else if($this->mobile_detect->isSonyTablet())
        {
            $deviceModel="SonyTablet";
        }
        else if($this->mobile_detect->isPhilipsTablet())
        {
            $deviceModel="PhilipsTablet";
        }
        else if($this->mobile_detect->isCubeTablet())
        {
            $deviceModel="CubeTablet";
        }
        else if($this->mobile_detect->isCobyTablet())
        {
            $deviceModel="CobyTablet";
        }
        else if($this->mobile_detect->isMIDTablet())
        {
            $deviceModel="MIDTablet";
        }
        else if($this->mobile_detect->isMSITablet())
        {
            $deviceModel="MSITablet";
        }
        else if($this->mobile_detect->isSMiTTablet())
        {
            $deviceModel="SMiTTablet";
        }
        else if($this->mobile_detect->isRockChipTablet())
        {
            $deviceModel="RockChipTablet";
        }
        else if($this->mobile_detect->isFlyTablet())
        {
            $deviceModel="FlyTablet";
        }
        else if($this->mobile_detect->isbqTablet())
        {
            $deviceModel="bqTablet";
        }
        else if($this->mobile_detect->isHuaweiTablet())
        {
            $deviceModel="HuaweiTablet";
        }
        else if($this->mobile_detect->isNecTablet())
        {
            $deviceModel="NecTablet";
        }
        else if($this->mobile_detect->isPantechTablet())
        {
            $deviceModel="PantechTablet";
        }
        else if($this->mobile_detect->isBronchoTablet())
        {
            $deviceModel="BronchoTablet";
        }
        else if($this->mobile_detect->isVersusTablet())
        {
            $deviceModel="VersusTablet";
        }
        else if($this->mobile_detect->isZyncTablet())
        {
            $deviceModel="ZyncTablet";
        }
        else if($this->mobile_detect->isPositivoTablet())
        {
            $deviceModel="PositivoTablet";
        }
        else if($this->mobile_detect->isNabiTablet())
        {
            $deviceModel="NabiTablet";
        }
        else if($this->mobile_detect->isKoboTablet())
        {
            $deviceModel="KoboTablet";
        }
        else if($this->mobile_detect->isDanewTablet())
        {
            $deviceModel="DanewTablet";
        }
        else if($this->mobile_detect->isTexetTablet())
        {
            $deviceModel="TexetTablet";
        }
        else if($this->mobile_detect->isPlaystationTablet())
        {
            $deviceModel="PlaystationTablet";
        }
        else if($this->mobile_detect->isTrekstorTablet())
        {
            $deviceModel="TrekstorTablet";
        }
        else if($this->mobile_detect->isPyleAudioTablet())
        {
            $deviceModel="PyleAudioTablet";
        }
        else if($this->mobile_detect->isAdvanTablet())
        {
            $deviceModel="AdvanTablet";
        }
        else if($this->mobile_detect->isDanyTechTablet())
        {
            $deviceModel="DanyTechTablet";
        }
        else if($this->mobile_detect->isGalapadTablet())
        {
            $deviceModel="GalapadTablet";
        }
        else if($this->mobile_detect->isMicromaxTablet())
        {
            $deviceModel="MicromaxTablet";
        }
        else if($this->mobile_detect->isKarbonnTablet())
        {
            $deviceModel="KarbonnTablet";
        }
        else if($this->mobile_detect->isAllFineTablet())
        {
            $deviceModel="AllFineTablet";
        }
        else if($this->mobile_detect->isPROSCANTablet())
        {
            $deviceModel="PROSCANTablet";
        }
        else if($this->mobile_detect->isYONESTablet())
        {
            $deviceModel="YONESTablet";
        }
        else if($this->mobile_detect->isChangJiaTablet())
        {
            $deviceModel="ChangJiaTablet";
        }
        else if($this->mobile_detect->isGUTablet())
        {
            $deviceModel="GUTablet";
        }
        else if($this->mobile_detect->isPointOfViewTablet())
        {
            $deviceModel="PointOfViewTablet";
        }
        else if($this->mobile_detect->isOvermaxTablet())
        {
            $deviceModel="OvermaxTablet";
        }
        else if($this->mobile_detect->isHCLTablet())
        {
            $deviceModel="HCLTablet";
        }
        else if($this->mobile_detect->isDPSTablet())
        {
            $deviceModel="DPSTablet";
        }
        else if($this->mobile_detect->isVistureTablet())
        {
            $deviceModel="VistureTablet";
        }
        else if($this->mobile_detect->isCrestaTablet())
        {
            $deviceModel="CrestaTablet";
        }
        else if($this->mobile_detect->isMediatekTablet())
        {
            $deviceModel="MediatekTablet";
        }
        else if($this->mobile_detect->isConcordeTablet())
        {
            $deviceModel="ConcordeTablet";
        }
        else if($this->mobile_detect->isGoCleverTablet())
        {
            $deviceModel="GoCleverTablet";
        }
        else if($this->mobile_detect->isModecomTablet())
        {
            $deviceModel="ModecomTablet";
        }
        else if($this->mobile_detect->isVoninoTablet())
        {
            $deviceModel="VoninoTablet";
        }
        else if($this->mobile_detect->isECSTablet())
        {
            $deviceModel="ECSTablet";
        }
        else if($this->mobile_detect->isStorexTablet())
        {
            $deviceModel="StorexTablet";
        }
        else if($this->mobile_detect->isVodafoneTablet())
        {
            $deviceModel="VodafoneTablet";
        }
        else if($this->mobile_detect->isEssentielBTablet())
        {
            $deviceModel="EssentielBTablet";
        }
        else if($this->mobile_detect->isRossMoorTablet())
        {
            $deviceModel="RossMoorTablet";
        }
        else if($this->mobile_detect->isiMobileTablet())
        {
            $deviceModel="iMobileTablet";
        }
        else if($this->mobile_detect->isTolinoTablet())
        {
            $deviceModel="TolinoTablet";
        }
        else if($this->mobile_detect->isAudioSonicTablet())
        {
            $deviceModel="AudioSonicTablet";
        }
        else if($this->mobile_detect->isAMPETablet())
        {
            $deviceModel="AMPETablet";
        }
        else if($this->mobile_detect->isSkkTablet())
        {
            $deviceModel="SkkTablet";
        }
        else if($this->mobile_detect->isTecnoTablet())
        {
            $deviceModel="TecnoTablet";
        }
        else if($this->mobile_detect->isJXDTablet())
        {
            $deviceModel="JXDTablet";
        }
        else if($this->mobile_detect->isiJoyTablet())
        {
            $deviceModel="iJoyTablet";
        }
        else if($this->mobile_detect->isFX2Tablet())
        {
            $deviceModel="FX2Tablet";
        }
        else if($this->mobile_detect->isXoroTablet())
        {
            $deviceModel="XoroTablet";
        }
        else if($this->mobile_detect->isViewsonicTablet())
        {
            $deviceModel="ViewsonicTablet";
        }
        else if($this->mobile_detect->isOdysTablet())
        {
            $deviceModel="OdysTablet";
        }
        else if($this->mobile_detect->isCaptivaTablet())
        {
            $deviceModel="CaptivaTablet";
        }
        else if($this->mobile_detect->isIconbitTablet())
        {
            $deviceModel="IconbitTablet";
        }
        else if($this->mobile_detect->isTeclastTablet())
        {
            $deviceModel="TeclastTablet";
        }
        else if($this->mobile_detect->isOndaTablet())
        {
            $deviceModel="OndaTablet";
        }
        else if($this->mobile_detect->isJaytechTablet())
        {
            $deviceModel="JaytechTablet";
        }
        else if($this->mobile_detect->isBlaupunktTablet())
        {
            $deviceModel="BlaupunktTablet";
        }
        else if($this->mobile_detect->isDigmaTablet())
        {
            $deviceModel="DigmaTablet";
        }
        else if($this->mobile_detect->isEvolioTablet())
        {
            $deviceModel="EvolioTablet";
        }
        else if($this->mobile_detect->isLavaTablet())
        {
            $deviceModel="LavaTablet";
        }
        else if($this->mobile_detect->isAocTablet())
        {
            $deviceModel="";
        }
        else if($this->mobile_detect->isMpmanTablet())
        {
            $deviceModel="AocTablet";
        }
        else if($this->mobile_detect->isCelkonTablet())
        {
            $deviceModel="CelkonTablet";
        }
        else if($this->mobile_detect->isWolderTablet())
        {
            $deviceModel="WolderTablet";
        }
        else if($this->mobile_detect->isMiTablet())
        {
            $deviceModel="MiTablet";
        }
        else if($this->mobile_detect->isNibiruTablet())
        {
            $deviceModel="NibiruTablet";
        }
        else if($this->mobile_detect->isNexoTablet())
        {
            $deviceModel="NexoTablet";
        }
        else if($this->mobile_detect->isLeaderTablet())
        {
            $deviceModel="LeaderTablet";
        }
        else if($this->mobile_detect->isUbislateTablet())
        {
            $deviceModel="UbislateTablet";
        }
        else if($this->mobile_detect->isPocketBookTablet())
        {
            $deviceModel="PocketBookTablet";
        }
        else if($this->mobile_detect->isKocasoTablet())
        {
            $deviceModel="KocasoTablet";
        }
        else if($this->mobile_detect->isHudl())
        {
            $deviceModel="Hudl";
        }
        else if($this->mobile_detect->isTelstraTablet())
        {
            $deviceModel="TelstraTablet";
        }
        else if($this->mobile_detect->isGenericTablet())
        {
            $deviceModel="GenericTablet";
        }
        else
        {
            $deviceModel = "Undefined";
        }
        return $deviceModel;
    }

    function getDeviceOS()
    {
        if($this->mobile_detect->isAndroidOS())
        {
            $deviceOS = "AndroidOS";
        }
        else if($this->mobile_detect->isBlackBerryOS())
        {
            $deviceOS = "BlackBerryOS";
        }
        else if($this->mobile_detect->isPalmOS())
        {
            $deviceOS = "PalmOS";
        }
        else if($this->mobile_detect->isSymbianOS())
        {
            $deviceOS = "SymbianOS";
        }
        else if($this->mobile_detect->isWindowsMobileOS())
        {
            $deviceOS = "WindowsMobileOS";
        }
        else if($this->mobile_detect->isWindowsPhoneOS())
        {
            $deviceOS = "WindowsPhoneOS";
        }
        else if($this->mobile_detect->isiOS())
        {
            $deviceOS = "iOS";
        }
        else if($this->mobile_detect->isMeeGoOS())
        {
            $deviceOS = "MeeGoOS";
        }
        else if($this->mobile_detect->isMaemoOS())
        {
            $deviceOS = "MaemoOS";
        }
        else if($this->mobile_detect->isJavaOS())
        {
            $deviceOS = "JavaOS";
        }
        else if($this->mobile_detect->iswebOS())
        {
            $deviceOS = "webOS";
        }
        else if($this->mobile_detect->isbadaOS())
        {
            $deviceOS = "badaOS";
        }
        else if($this->mobile_detect->isBREWOS())
        {
            $deviceOS = "BREWOS";
        }
        else
        {
            $deviceOS = "Undefined";
        }
        return $deviceOS;
    }
}