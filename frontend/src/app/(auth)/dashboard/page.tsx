"use client";

import { useAuth } from "@/hooks/auth";

export default function Home() {
  const { logout } = useAuth();
  return (
    <>
      <div className="text-5xl">Welcome</div>
      <button
        onClick={() => {
          logout();
        }}
      >
        {" "}
        Logout
      </button>
    </>
  );
}
