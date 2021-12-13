import React, { useEffect } from 'react';
import { userLogout } from "../services/auth";
import { Link, useHistory } from "react-router-dom";
import LOGO from '../assets/img/ilegs-logo.png';

export default function Sidebar() {

    const history = useHistory();


    const logout = async (e) => {
        e.preventDefault();
        try {
            let res = await userLogout();
            console.log(res);
            history.push({
                pathname: `/`,
            });
        } catch (err) {
            console.log(err.response);
            localStorage.removeItem("ISUT");
            history.push({
                pathname: `/`,
            });
        }
    };

    useEffect(() => {
        return () => {

        }
    }, [])


    return (
        <div className="main-sidebar">
            <aside id="sidebar-wrapper">
                <div className="sidebar-brand">
                    <img src={LOGO} alt="ILEGSOSA Logo" className="mt-3" />
                </div>
                <div className="sidebar-brand sidebar-brand-sm">
                    <Link to="/">IL</Link>
                </div>
                <ul className="sidebar-menu">
                    <li className={"nav-item dropdown mt-4 " + (window.location.href.indexOf("/") !== -1
                        ? "active"
                        : "")
                    } >
                        <Link to="/" className="nav-link "><i className="fa fa-th-large"></i> <span>Dashboard</span></Link>
                    </li>
                    <li className={"nav-item dropdown mt-4 " + (window.location.href.indexOf("/announcements") !== -1
                        ? "active"
                        : "")
                    }>
                        <Link to="/announcements" className="nav-link "><i className="far fa-file-alt"></i><span>Announcements</span></Link>
                    </li>
                    <li className={"nav-item dropdown mt-4 " + (window.location.href.indexOf("/connect-with-mates") !== -1
                        ? "active"
                        : "")
                    }>
                        <Link to="/connect-with-mates" className="nav-link"><i className="far fa-user"></i> <span>Connect with mates</span></Link>
                    </li>
                    <li className={"nav-item dropdown mt-4 " + (window.location.href.indexOf("/discussion-thread") !== -1
                        ? "active"
                        : "")
                    }>
                        <Link to="/discussion-thread" className="nav-link"><i className="fas fa-tasks"></i> <span>Discussion Thread</span></Link>
                    </li>
                    <li className={"nav-item dropdown mt-4 " + (window.location.href.indexOf("/pay-due") !== -1
                        ? "active"
                        : "")
                    }>
                        <Link to="/pay-due" className="nav-link"><i className="fas fa-wallet"></i> <span>Pay Due</span></Link>
                    </li>
                    <li className={"nav-item dropdown mt-4 " + (window.location.href.indexOf("/vote") !== -1
                        ? "active"
                        : "")
                    }>
                        <Link to="/vote" className="nav-link"><i className="far fa-chart-bar"></i><span>Cast Vote</span></Link>
                    </li>
                    <li className={"nav-item dropdown  mt-4 " + (window.location.href.indexOf("/profile") !== -1
                        ? "active"
                        : "")
                    }>
                        <Link to="/profile" className="nav-link"><i className="fa fa-cog"></i> <span>Update Profile</span></Link>
                    </li>
                    <li><a className="nav-link  mt-4" href="#logout"
                        onClick={(e) => logout(e)}><i className="fa fa-sign-out-alt"></i> <span>Log out</span></a></li>
                </ul>

            </aside>
        </div>
    )
}
