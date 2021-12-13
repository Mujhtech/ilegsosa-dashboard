import React from 'react';
import { getUser, userLogout } from "../services/auth";
import { Link, useHistory } from "react-router-dom";

export default function Nav() {

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

    return (
        <nav className="navbar navbar-expand-lg main-navbar">
            <form className="form-inline mr-auto">
                <ul className="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" className="nav-link nav-link-lg"><i className="fa fa-bars"></i></a></li>
                </ul>
            </form>
            <ul className="navbar-nav navbar-right">
                <li className="dropdown"><a href="#" data-toggle="dropdown" className="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src={getUser().avatar} className="rounded-circle mr-1" />
                    <div className="d-sm-none d-lg-inline-block">Hi, {getUser().full_name}</div></a>
                    <div className="dropdown-menu dropdown-menu-right">
                        <Link href="/profile" className="dropdown-item has-icon">
                            <i className="fa fa-cog"></i> Update Profile
                        </Link>
                        <div className="dropdown-divider"></div>
                        <a href="#logout"
                            onClick={(e) => logout(e)} className="dropdown-item has-icon text-danger">
                            <i className="fa fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    )
}
